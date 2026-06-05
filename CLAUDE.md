# HUDL Website — Project Guide

Static marketing site for **HUDL Consultancy** (hudl.gg), a UK strategic marketing agency (brand strategy, paid media/PPC, SEO, content, performance marketing). No build step — plain HTML/CSS/JS served as static files (Netlify, with `_redirects`).

## Layout
- `index.html`, `blog.html`, `article.html`, `thank-you.html` — top-level pages.
- `_posts/YYYY-MM-DD-slug.md` — blog source (markdown + frontmatter), edited via Decap/Netlify CMS (`admin/config.yml`). Frontmatter: `title, date, category, summary, read_time, thumbnail`.
- `posts/slug.html` — companion HTML page per post (renders markdown with marked.js).
- `dashboards/*.html` — self-contained, password-gated client reporting dashboards.
- `Campaign performance.csv` — example Google Ads export (GBP).
- `launchpad.html` — internal control panel for the AI agents (noindex).
- `BRAIN.md` — the shared knowledge hub all agents read first (team, voice, rules, priorities, client map).
- `clients/<slug>/` — dedicated workspace per client (`profile.md` + `decisions.md` + `data/`, `reports/`, `content/`, `outreach/`). See `clients/README.md`. Current clients: `hudl` (our own marketing), `abels`, `bishops`, `gerson`, `gms`, `agm`. Copy `clients/_template` to onboard a new one.

## Brand
Dark theme. Colours: `--yellow #fbbf46`, `--red #ff515e`, `--blue #45aeff`, `--cyan #1edfd4`, on near-black `#0c0c0c`/`#000`. Fonts: **Barlow Condensed** (display, uppercase) + **Source Sans 3** (body). Four-colour stripe bar (yellow/blue/red/cyan) is a recurring accent. British English everywhere.

## 🧠 The Brain (`BRAIN.md`) — read first
`BRAIN.md` at the repo root is the **shared knowledge hub** every agent reads before any task: the team roster, HUDL's voice, the rules that never change, current priorities, and the client map. It's the single source of truth — keep it short and current.

## AI Agents (`.claude/agents/`)
Claude Code subagents tailored to the business, each with a friendly name — see `launchpad.html` for the friendly overview and copy-paste quick actions:
- **Hunter** (`campaign-manager`) — the **front door / concierge**. Ask "what should I work on?", or for whole multi-channel campaigns; orchestrates the others. Saves to `clients/<slug>/campaigns/`.
- **Pippa** (`ppc-analyst`) — analyses campaign CSVs, flags wasted spend, writes client summaries.
- **Hendrix** (`content-writer`) — SEO blog posts in the `_posts` + `posts/` format and HUDL voice.
- **Dash** (`dashboard-builder`) — new client dashboards matching `dashboards/*.html`.
- **Otis** (`outreach-copywriter`) — outreach emails, ad copy, landing pages, proposals.
- **Solo** (`social-media-manager`) — social calendar + platform-native posts (LinkedIn/Instagram/X/Facebook), Canva visuals, scheduling. Prepares ready-to-publish packs; can't auto-post without a publishing integration.
- **Slate** (`slides-builder`) — builds Google Slides board packs and pitch decks. Generates a Google Apps Script (`.gs` file saved to `clients/<slug>/reports/`) that the user runs once in script.google.com to create a fully formatted deck in their Google Drive.

All agents are **client-aware**: after the Brain, when a client is named they read `clients/<slug>/profile.md` **and `clients/<slug>/decisions.md`** (the client's learned preferences/corrections), work from that client's `data/`, and write deliverables into the client's `reports/`/`content/`/`outreach/` folders. New corrections/preferences get logged back to `decisions.md` so the team never has to be told twice.

## Conventions
- Keep pages self-contained; match existing inline-CSS patterns and brand variables.
- Don't fabricate metrics or client results — use ranges/placeholders and label illustrative figures.
- Dashboard password gates are light obfuscation only, not real security.
