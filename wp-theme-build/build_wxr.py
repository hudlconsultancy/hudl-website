#!/usr/bin/env python3
"""
Convert the HUDL _posts/*.md blog files into a single WordPress WXR (XML)
import file, importable via Tools > Import > WordPress.

For each post it emits:
  - title, slug, publish date (local + GMT), author
  - content (Markdown -> HTML), excerpt (frontmatter summary)
  - category (case-study / marketing-tips / industry-insights)
  - featured image as an <attachment> item linked via _thumbnail_id
    (image URLs are made absolute against https://www.hudl.gg so the importer
    can download them when "Download and import file attachments" is ticked)
"""

import glob
import html
import os
import re
from datetime import datetime, timedelta, timezone
from urllib.parse import quote

import yaml

POSTS_DIR = os.path.join(os.path.dirname(__file__), "..", "_posts")
SITE_URL = "https://www.hudl.gg"
OUT_FILE = os.path.join(os.path.dirname(__file__), "hudl-blog-import.xml")

AUTHOR_LOGIN = "hudl"
AUTHOR_NAME = "HUDL Consultancy"
AUTHOR_EMAIL = "contact@hudl.gg"

CATEGORY_LABELS = {
    "case-study": "Case Study",
    "marketing-tips": "Marketing Tips",
    "industry-insights": "Industry Insights",
}

# ---------------------------------------------------------------------------
# Markdown -> HTML
# ---------------------------------------------------------------------------

def esc(text):
    return html.escape(text, quote=False)


def inline(text):
    """Inline markdown: images, links, bold, italic, inline code."""
    text = esc(text)
    # Images: ![alt](url)
    text = re.sub(
        r"!\[([^\]]*)\]\(([^)]+)\)",
        lambda m: '<img src="%s" alt="%s" />' % (m.group(2), m.group(1)),
        text,
    )
    # Links: [text](url)
    text = re.sub(
        r"\[([^\]]+)\]\(([^)]+)\)",
        lambda m: '<a href="%s">%s</a>' % (m.group(2), m.group(1)),
        text,
    )
    # Inline code
    text = re.sub(r"`([^`]+)`", r"<code>\1</code>", text)
    # Bold + italic
    text = re.sub(r"\*\*\*(.+?)\*\*\*", r"<strong><em>\1</em></strong>", text)
    text = re.sub(r"\*\*(.+?)\*\*", r"<strong>\1</strong>", text)
    text = re.sub(r"(?<!\*)\*(?!\*)(.+?)(?<!\*)\*(?!\*)", r"<em>\1</em>", text)
    return text


def md_to_html(md):
    lines = md.replace("\r\n", "\n").replace("\r", "\n").split("\n")
    out = []
    i = 0
    n = len(lines)

    def flush_para(buf):
        if buf:
            out.append("<p>" + inline(" ".join(buf).strip()) + "</p>")

    para = []
    while i < n:
        line = lines[i]
        stripped = line.strip()

        # Blank line -> paragraph break
        if stripped == "":
            flush_para(para)
            para = []
            i += 1
            continue

        # Horizontal rule
        if re.match(r"^(-{3,}|\*{3,}|_{3,})$", stripped):
            flush_para(para)
            para = []
            out.append("<hr />")
            i += 1
            continue

        # Heading
        m = re.match(r"^(#{1,6})\s+(.*)$", stripped)
        if m:
            flush_para(para)
            para = []
            level = len(m.group(1))
            out.append("<h%d>%s</h%d>" % (level, inline(m.group(2).strip()), level))
            i += 1
            continue

        # Blockquote (consecutive > lines)
        if stripped.startswith(">"):
            flush_para(para)
            para = []
            quote_lines = []
            while i < n and lines[i].strip().startswith(">"):
                quote_lines.append(re.sub(r"^\s*>\s?", "", lines[i]))
                i += 1
            out.append("<blockquote><p>" + inline(" ".join(l.strip() for l in quote_lines).strip()) + "</p></blockquote>")
            continue

        # Unordered list
        if re.match(r"^[-*+]\s+", stripped):
            flush_para(para)
            para = []
            items = []
            while i < n and re.match(r"^[-*+]\s+", lines[i].strip()):
                items.append(re.sub(r"^[-*+]\s+", "", lines[i].strip()))
                i += 1
            out.append("<ul>" + "".join("<li>%s</li>" % inline(it) for it in items) + "</ul>")
            continue

        # Ordered list
        if re.match(r"^\d+\.\s+", stripped):
            flush_para(para)
            para = []
            items = []
            while i < n and re.match(r"^\d+\.\s+", lines[i].strip()):
                items.append(re.sub(r"^\d+\.\s+", "", lines[i].strip()))
                i += 1
            out.append("<ol>" + "".join("<li>%s</li>" % inline(it) for it in items) + "</ol>")
            continue

        # Default: accumulate paragraph text
        para.append(stripped)
        i += 1

    flush_para(para)
    return "\n\n".join(out)


# ---------------------------------------------------------------------------
# Frontmatter + dates
# ---------------------------------------------------------------------------

def parse_file(path):
    with open(path, "r", encoding="utf-8") as fh:
        raw = fh.read()
    m = re.match(r"^---\n(.*?)\n---\n?(.*)$", raw, re.DOTALL)
    if not m:
        return {}, raw
    meta = yaml.safe_load(m.group(1)) or {}
    body = m.group(2).strip()
    return meta, body


def parse_date(value):
    """Return (local_dt_naive, gmt_dt_naive) from a frontmatter date value."""
    if isinstance(value, datetime):
        dt = value
    else:
        s = str(value).strip()
        # ISO 8601 with optional ms and timezone, or plain date.
        m = re.match(
            r"^(\d{4})-(\d{2})-(\d{2})"
            r"(?:[T ](\d{2}):(\d{2})(?::(\d{2}))?(?:\.\d+)?\s*"
            r"(Z|[+-]\d{2}:?\d{2})?)?$",
            s,
        )
        if not m:
            dt = datetime.now()
            return dt.replace(tzinfo=None), dt.replace(tzinfo=None)
        year, mon, day = int(m.group(1)), int(m.group(2)), int(m.group(3))
        hh = int(m.group(4)) if m.group(4) else 9
        mm = int(m.group(5)) if m.group(5) else 0
        ss = int(m.group(6)) if m.group(6) else 0
        tz = m.group(7)
        if tz in (None, "Z"):
            offset = timezone.utc
        else:
            tz = tz.replace(":", "")
            sign = 1 if tz[0] == "+" else -1
            offset = timezone(sign * timedelta(hours=int(tz[1:3]), minutes=int(tz[3:5])))
        dt = datetime(year, mon, day, hh, mm, ss, tzinfo=offset)
    if dt.tzinfo is None:
        dt = dt.replace(tzinfo=timezone.utc)
    local = dt
    gmt = dt.astimezone(timezone.utc)
    return local.replace(tzinfo=None), gmt.replace(tzinfo=None)


def slugify(name):
    name = name.lower()
    name = name.replace("'", "").replace("’", "").replace("‘", "")
    name = re.sub(r"[^a-z0-9]+", "-", name)
    return name.strip("-")


def abs_image_url(thumb):
    if not thumb:
        return ""
    thumb = str(thumb).strip()
    if thumb.startswith("http://") or thumb.startswith("https://"):
        return thumb
    if not thumb.startswith("/"):
        thumb = "/" + thumb
    # URL-encode the path (handles spaces, curly apostrophes, etc.)
    return SITE_URL + quote(thumb)


# ---------------------------------------------------------------------------
# WXR helpers
# ---------------------------------------------------------------------------

def cdata(text):
    text = "" if text is None else str(text)
    text = text.replace("]]>", "]]]]><![CDATA[>")
    return "<![CDATA[" + text + "]]>"


def rfc822(dt):
    return dt.strftime("%a, %d %b %Y %H:%M:%S +0000")


def sql_dt(dt):
    return dt.strftime("%Y-%m-%d %H:%M:%S")


# ---------------------------------------------------------------------------
# Build
# ---------------------------------------------------------------------------

def main():
    files = sorted(glob.glob(os.path.join(POSTS_DIR, "*.md")))
    items = []
    used_categories = {}
    post_id = 101
    attach_id = 5001

    for path in files:
        meta, body = parse_file(path)
        if not meta:
            continue

        filename = os.path.basename(path)
        base = re.sub(r"^\d{4}-\d{2}-\d{2}-", "", filename)
        base = re.sub(r"\.md$", "", base)
        slug = slugify(base)

        title = str(meta.get("title", "Untitled")).strip()
        summary = str(meta.get("summary", "")).strip()
        category = str(meta.get("category", "")).strip().strip('"')
        local_dt, gmt_dt = parse_date(meta.get("date"))
        content_html = md_to_html(body)
        thumb_url = abs_image_url(meta.get("thumbnail"))

        if category:
            used_categories[category] = CATEGORY_LABELS.get(
                category, category.replace("-", " ").title()
            )

        this_post_id = post_id
        post_id += 1

        thumb_meta = ""
        attachment_item = ""
        if thumb_url:
            this_attach_id = attach_id
            attach_id += 1
            img_name = os.path.basename(thumb_url)
            attachment_item = """
  <item>
    <title>%(title)s</title>
    <link>%(url)s</link>
    <pubDate>%(pub)s</pubDate>
    <dc:creator>%(author)s</dc:creator>
    <guid isPermaLink="false">%(url)s</guid>
    <description></description>
    <content:encoded>%(empty)s</content:encoded>
    <excerpt:encoded>%(empty)s</excerpt:encoded>
    <wp:post_id>%(aid)d</wp:post_id>
    <wp:post_date>%(date)s</wp:post_date>
    <wp:post_date_gmt>%(date_gmt)s</wp:post_date_gmt>
    <wp:comment_status>closed</wp:comment_status>
    <wp:ping_status>closed</wp:ping_status>
    <wp:post_name>%(slug)s</wp:post_name>
    <wp:status>inherit</wp:status>
    <wp:post_parent>%(pid)d</wp:post_parent>
    <wp:menu_order>0</wp:menu_order>
    <wp:post_type>attachment</wp:post_type>
    <wp:post_password></wp:post_password>
    <wp:is_sticky>0</wp:is_sticky>
    <wp:attachment_url>%(url)s</wp:attachment_url>
  </item>""" % {
                "title": cdata(img_name),
                "url": html.escape(thumb_url),
                "pub": rfc822(gmt_dt),
                "author": cdata(AUTHOR_LOGIN),
                "empty": cdata(""),
                "aid": this_attach_id,
                "date": cdata(sql_dt(local_dt)),
                "date_gmt": cdata(sql_dt(gmt_dt)),
                "slug": cdata(slugify(os.path.splitext(img_name)[0])),
                "pid": this_post_id,
            }
            thumb_meta = """
    <wp:postmeta>
      <wp:meta_key>_thumbnail_id</wp:meta_key>
      <wp:meta_value>%s</wp:meta_value>
    </wp:postmeta>""" % cdata(this_attach_id)

        category_xml = ""
        if category:
            category_xml = '\n    <category domain="category" nicename="%s">%s</category>' % (
                html.escape(category),
                cdata(used_categories[category]),
            )

        item = """
  <item>
    <title>%(title)s</title>
    <link>%(site)s/article?post=%(slug)s</link>
    <pubDate>%(pub)s</pubDate>
    <dc:creator>%(author)s</dc:creator>
    <guid isPermaLink="false">%(site)s/?p=%(pid)d</guid>
    <description></description>
    <content:encoded>%(content)s</content:encoded>
    <excerpt:encoded>%(excerpt)s</excerpt:encoded>
    <wp:post_id>%(pid)d</wp:post_id>
    <wp:post_date>%(date)s</wp:post_date>
    <wp:post_date_gmt>%(date_gmt)s</wp:post_date_gmt>
    <wp:comment_status>closed</wp:comment_status>
    <wp:ping_status>closed</wp:ping_status>
    <wp:post_name>%(slug_cdata)s</wp:post_name>
    <wp:status>publish</wp:status>
    <wp:post_parent>0</wp:post_parent>
    <wp:menu_order>0</wp:menu_order>
    <wp:post_type>post</wp:post_type>
    <wp:post_password></wp:post_password>
    <wp:is_sticky>0</wp:is_sticky>%(category)s%(thumbmeta)s
  </item>%(attachment)s""" % {
            "title": cdata(title),
            "site": SITE_URL,
            "slug": slug,
            "slug_cdata": cdata(slug),
            "pub": rfc822(gmt_dt),
            "author": cdata(AUTHOR_LOGIN),
            "pid": this_post_id,
            "content": cdata(content_html),
            "excerpt": cdata(summary),
            "date": cdata(sql_dt(local_dt)),
            "date_gmt": cdata(sql_dt(gmt_dt)),
            "category": category_xml,
            "thumbmeta": thumb_meta,
            "attachment": attachment_item,
        }
        items.append(item)

    category_terms = ""
    for slug_cat, label in used_categories.items():
        category_terms += """
  <wp:category>
    <wp:term_id>0</wp:term_id>
    <wp:category_nicename>%s</wp:category_nicename>
    <wp:category_parent></wp:category_parent>
    <wp:cat_name>%s</wp:cat_name>
  </wp:category>""" % (html.escape(slug_cat), cdata(label))

    now = datetime.now(timezone.utc).replace(tzinfo=None)
    xml = """<?xml version="1.0" encoding="UTF-8" ?>
<!-- HUDL Consultancy blog export — generated for WordPress import (Tools > Import > WordPress). -->
<rss version="2.0"
  xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:wp="http://wordpress.org/export/1.2/">
<channel>
  <title>HUDL Consultancy</title>
  <link>%(site)s</link>
  <description>Insights &amp; Thinking from HUDL Consultancy</description>
  <pubDate>%(pub)s</pubDate>
  <language>en-GB</language>
  <wp:wxr_version>1.2</wp:wxr_version>
  <wp:base_site_url>%(site)s</wp:base_site_url>
  <wp:base_blog_url>%(site)s</wp:base_blog_url>
  <wp:author>
    <wp:author_id>1</wp:author_id>
    <wp:author_login>%(alogin)s</wp:author_login>
    <wp:author_email>%(aemail)s</wp:author_email>
    <wp:author_display_name>%(aname)s</wp:author_display_name>
    <wp:author_first_name></wp:author_first_name>
    <wp:author_last_name></wp:author_last_name>
  </wp:author>%(cats)s
%(items)s
</channel>
</rss>
""" % {
        "site": SITE_URL,
        "pub": rfc822(now),
        "alogin": cdata(AUTHOR_LOGIN),
        "aemail": cdata(AUTHOR_EMAIL),
        "aname": cdata(AUTHOR_NAME),
        "cats": category_terms,
        "items": "\n".join(items),
    }

    with open(OUT_FILE, "w", encoding="utf-8") as fh:
        fh.write(xml)

    print("Wrote %s" % OUT_FILE)
    print("Posts: %d   Categories: %s" % (len(items), ", ".join(used_categories)))


if __name__ == "__main__":
    main()
