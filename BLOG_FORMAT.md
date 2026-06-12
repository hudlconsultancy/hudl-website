# Blog Post Format — Guide for the Marblism AI Agent

This is the spec for generating blog posts for the HUDL website (hudl.gg). Follow
it exactly and the post will publish correctly with **no manual fixes** before
upload. Each rule below exists because it was a fix we had to make by hand.

The site is static. Posts are markdown files in `_posts/` rendered at runtime by
`article.html` (via marked.js) and listed by `blog.html`. There is **no build
step** — what you write in the markdown is what renders.

---

## 1. Filename

```
_posts/YYYY-MM-DD-slug.md
```

- Date prefix = publish date. Example: `2026-06-12-...`
- The **slug** is everything after the date. It becomes the live URL:
  `https://www.hudl.gg/article?post=<slug>`.
- **Slug must be plain ASCII**: lowercase `a–z`, digits `0–9`, hyphens only.
  - ❌ No apostrophes — **especially curly ones** (`'`). `isn't` → use `isnt` or
    reword (`is-not`). A curly apostrophe in the filename produces a broken,
    ugly URL.
  - ❌ No spaces, `&`, `(`, `)`, `?`, `.`, accents or emoji.
  - ✅ Good: `10-reasons-your-buckinghamshire-marketing-isnt-working.md`

## 2. Frontmatter

Exactly these fields, in this order, between `---` fences. They map 1:1 to the
CMS schema (`admin/config.yml`):

```yaml
---
title: "10 Reasons Your Buckinghamshire Marketing Isn't Working"
date: 2026-06-12T11:24:00.000+01:00
category: marketing-tips
summary: "One or two plain-English sentences for the blog card and meta description. ~140–160 characters."
read_time: "6 min read"
thumbnail: /images/uploads/your-slug.png
---
```

Rules:
- **title** — Normal sentence/title case is fine. The site auto-uppercases it in
  CSS, so don't shout in all-caps. Keep it on **one line** (no line wrapping).
- **date** — ISO 8601. `YYYY-MM-DD` or full `YYYY-MM-DDTHH:MM:SS.000+01:00`.
- **category** — **must be exactly one of these three** (anything else loses the
  coloured category tag):
  - `case-study` (yellow tag)
  - `marketing-tips` (blue tag)
  - `industry-insights` (cyan tag)
- **summary** — plain text, in quotes. No markdown.
- **read_time** — string like `"6 min read"`.
- **thumbnail** — site-absolute path starting with `/images/uploads/`. Upload the
  image to `images/uploads/` and name it after the slug (`.png`, `.webp` or
  `.svg`). This image is the post's **hero** and its card image (see §4).

## 3. No H1 / no title in the body

The title comes from frontmatter only. **Do not** start the body with
`# THE TITLE`. Start straight into the opening paragraph.

## 4. No hero image at the top of the body

`article.html` automatically renders the `thumbnail` as a full-width hero image
at the top of the article. **Do not** also place an image as the first line of
the body — it creates a duplicate. Begin the body with text.

(Inline images further down, to illustrate a section, are fine — see §6.)

## 5. Heading levels — this controls the title colour

The renderer styles headings by level. Get this right and section titles come out
in brand **yellow** automatically; get it wrong and they render plain grey.

- `##` → **section heading, renders YELLOW** (`--yellow`). Use for every main
  section ("Why Your Strategy Is Stalling", "How We Fix It", the closing CTA
  heading, etc.).
- `###` → sub-heading / list item, renders light grey. Use for numbered points
  *inside* a section (`### 01. ...`).
- ❌ **Do not** start sections at `###`, and **never use `####`** — both lose the
  yellow.

Correct structure:

```markdown
Opening paragraph...

## Why Your Strategy Is Stalling

### 01. You're Prioritising Tactics Over Strategy
Body text...

### 02. Sales Is Driving the Bus
Body text...

## How We Fix the Engine
Body text...

## Ready to Stop the Leakage?
Closing CTA paragraph and link.
```

## 6. Body content rules

- **British English everywhere** — `optimise`, `behaviour`, `fulfilment`,
  `modelled`, `prioritise`, `-ise` not `-ize`. (Common slips to avoid:
  optimization, behavior, fulfillment, modeled.)
- **Punctuation** — use an em dash `—` for breaks in a sentence, not a colon.
  Write `money goes in — but growth never comes out`, not `money goes in: but...`.
- **Links** — inline markdown, e.g. `[HUDL](https://hudl.gg/)`. Link relevant
  service mentions (SEO, paid media, GA4) to `https://hudl.gg/`.
- **Brand voice** — confident, plain-English, no jargon dumps. No fabricated
  stats or client results; use ranges or clearly-illustrative figures.
- **Inline images** (optional) — standard markdown
  `![descriptive alt text](url)` with real, descriptive alt text. Prefer images
  hosted under `/images/uploads/`. Remember the thumbnail already covers the top
  of the article, so only add inline images that genuinely illustrate a section.
- **Closing CTA** — end with a `##` heading and a bold call-to-action link, e.g.
  `**[Book a commercial audit with HUDL today](https://hudl.gg/)**`.

## 7. Quick pre-upload checklist

- [ ] Filename `YYYY-MM-DD-slug.md`, slug is ASCII, lowercase, hyphens, **no
      curly apostrophes**.
- [ ] Frontmatter has all six fields; `category` is one of the three allowed.
- [ ] Body does **not** start with `#` title or a hero image.
- [ ] Section headings are `##` (yellow); sub-points are `###`; no `####`.
- [ ] British English; em dashes not colons.
- [ ] `thumbnail` uploaded to `/images/uploads/` and named after the slug.
- [ ] Closing `##` CTA heading + bold link to hudl.gg.
