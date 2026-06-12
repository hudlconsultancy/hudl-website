=== HUDL Consultancy ===

Custom WordPress theme converted from the static hudl.gg single-page site.
Dark theme, four-colour brand stripe (yellow / blue / red / cyan), bold uppercase
Barlow Condensed display type with Source Sans 3 body — replicating the original
homepage, blog grid and article designs.

== Installation ==

1. In WordPress, go to Appearance → Themes → Add New → Upload Theme.
2. Upload hudl-consultancy.zip and click "Install Now", then "Activate".

== Recommended setup ==

The theme works out of the box. For the best match to hudl.gg:

1. HOMEPAGE
   - With the default reading setting ("Your latest posts") the homepage already
     shows the full HUDL landing page (hero, services, process, about, clients,
     founders, CTA) via front-page.php — nothing to configure.
   - If you prefer an explicit static front page:
     Settings → Reading → "A static page" →
        Front page: create/select any page (front-page.php renders the landing
        regardless of that page's content),
        Posts page: create a page called "Insights" — this becomes your blog grid.

2. NAVIGATION
   - Appearance → Menus → create a menu and assign it to the "Primary Menu" location.
   - To style the consultation button like the original yellow CTA, add the CSS
     class "nav-cta" to that menu item (enable Screen Options → CSS Classes first).
   - If no menu is assigned, the theme shows a sensible default menu automatically.

3. BLOG CATEGORIES (brand colours)
   Create these categories so posts pick up the original colour coding and the
   filter bar appears:
     - Case Study          (slug: case-study)        → yellow
     - Marketing Tips       (slug: marketing-tips)     → blue
     - Industry Insights    (slug: industry-insights)  → cyan

4. POSTS
   - Set a Featured Image on each post — it is used as the blog card thumbnail and
     the article hero image (matching the original "thumbnail" frontmatter).
   - Reading time ("6 min read") is calculated automatically from the content.

5. LOGO
   - A text wordmark (HUDL in brand colours) is used by default.
   - To use an image logo instead: Appearance → Customize → Site Identity → Logo.

6. THANK YOU PAGE (form confirmation)
   - Create a Page titled "Thank You" with the slug "thank-you"
     (Pages → Add New → Title "Thank You" → confirm the permalink slug is
     "thank-you" → Publish).
   - The theme automatically renders it with the branded confirmation design
     (page-thank-you.php) — you do NOT need to add any content. If you do add
     body content it replaces the default headline/message.
   - The consultation form already posts to /thank-you/, so submissions land here.

== Files ==

  style.css              Theme header + all styles
  functions.php          Enqueues styles/scripts, menus, helpers
  header.php             Brand stripe + primary navigation
  footer.php             Site footer
  front-page.php         Homepage landing (always)
  index.php              Homepage (front) / Insights grid fallback
  page.php               Generic page template
  single.php             Individual blog post (article layout)
  archive.php            Blog/category listing (grid layout)
  js/theme.js            Nav, mobile menu, smooth scroll, reveal, filters
  template-parts/        Homepage sections + reusable blog card

== Notes ==

- British English throughout, matching the brand voice.
- The original consultation form posted to Netlify Forms; in WordPress the form
  posts to /thank-you/. Wire it to your preferred form/CRM plugin (e.g. WPForms,
  Contact Form 7, Fluent Forms) or a webhook as needed.
- Google Tag Manager is not bundled; add it with a GTM plugin or in the header if
  you want to retain the original GTM-WS5VXXLD container.

Version 1.0.0
