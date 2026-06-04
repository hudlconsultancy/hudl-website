# HUDL Website — Project Guide

Static marketing site for **HUDL Consultancy** (hudl.gg), a UK strategic marketing agency (brand strategy, paid media/PPC, SEO, content, performance marketing). No build step — plain HTML/CSS/JS served as static files (Netlify, with `_redirects`).

## Layout
- `index.html`, `blog.html`, `article.html`, `thank-you.html` — top-level pages.
- `_posts/YYYY-MM-DD-slug.md` — blog source (markdown + frontmatter), edited via Decap/Netlify CMS (`admin/config.yml`). Frontmatter: `title, date, category, summary, read_time, thumbnail`.
- `posts/slug.html` — companion HTML page per post (renders markdown with marked.js).
- `dashboards/*.html` — self-contained, password-gated client reporting dashboards.
- `Campaign performance.csv` — example Google Ads export (GBP).
- `launchpad.html` — internal control panel for the AI agents (noindex).
- `clients/<slug>/` — dedicated workspace per client (`profile.md` + `data/`, `reports/`, `content/`, `outreach/`). See `clients/README.md`. Current clients: `abels`, `bishops`, `gerson`. Copy `clients/_template` to onboard a new one.

## Brand
Dark theme. Colours: `--yellow #fbbf46`, `--red #ff515e`, `--blue #45aeff`, `--cyan #1edfd4`, on near-black `#0c0c0c`/`#000`. Fonts: **Barlow Condensed** (display, uppercase) + **Source Sans 3** (body). Four-colour stripe bar (yellow/blue/red/cyan) is a recurring accent. British English everywhere.

## AI Agents (`.claude/agents/`)
Claude Code subagents tailored to the business — see `launchpad.html` for the friendly overview:
- **ppc-analyst** — analyses campaign CSVs, flags wasted spend, writes client summaries.
- **content-writer** — SEO blog posts in the `_posts` + `posts/` format and HUDL voice.
- **dashboard-builder** — new client dashboards matching `dashboards/*.html`.
- **outreach-copywriter** — outreach emails, ad copy, landing pages, proposals.

All agents are **client-aware**: when a client is named they read `clients/<slug>/profile.md` first, work from that client's `data/`, and write deliverables into the client's `reports/`/`content/`/`outreach/` folders.

## Conventions
- Keep pages self-contained; match existing inline-CSS patterns and brand variables.
- Don't fabricate metrics or client results — use ranges/placeholders and label illustrative figures.
- Dashboard password gates are light obfuscation only, not real security.
