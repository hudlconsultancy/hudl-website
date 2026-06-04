# Client Workspaces

Each HUDL client has a dedicated workspace under `clients/<slug>/`. This gives every agent a consistent place to **read context from** and **write deliverables to**, so work stays organised per client and nothing gets mixed up.

## Structure

```
clients/<slug>/
  profile.md     # Persistent client context — agents READ this first
  decisions.md   # Saved preferences & corrections — the client's memory (READ second)
  data/          # Campaign exports, CSVs, raw data
  reports/       # PPC analyses & performance summaries (Pippa / ppc-analyst)
  content/       # Blog drafts & content for this client (Hendrix / content-writer)
  outreach/      # Emails, proposals, ad copy (Otis / outreach-copywriter)
```

> Before all of this, every agent reads the repo-root **`BRAIN.md`** — the shared hub (team, voice, rules, priorities, client map).

Client dashboards still live in the top-level `dashboards/` folder (so they deploy with the site), but each `profile.md` links to the client's dashboard, password and storage key.

## How agents use a workspace

When you name a client, the agent should:
1. **Read `BRAIN.md`** (repo root) for shared context, then **`clients/<slug>/profile.md`** for the client's sector, services, tone, dashboard and current focus, then **`clients/<slug>/decisions.md`** for any saved preferences/corrections.
2. **Look in `data/`** for the latest exports to work from.
3. **Write its output into the matching subfolder** (`reports/`, `content/`, `outreach/`) with a dated filename, e.g. `reports/2026-06-04-ppc-review.md`.
4. **Log any new preference or correction** back into `decisions.md` so it's remembered next time.

Examples:
- `@ppc-analyst review the latest export for Abels` → reads `clients/abels/`, writes to `clients/abels/reports/`.
- `@content-writer draft a relocation guide for Gerson` → writes to `clients/gerson/content/`.

## Current clients

| Slug | Client | Sector | Dashboard |
|------|--------|--------|-----------|
| `hudl` | HUDL Consultancy _(our own)_ | UK marketing consultancy | _internal — blog ships to `/_posts`_ |
| `agm` | AGM Relocation Ltd _(**parent group**)_ | Group of 4 removal/relocation brands | `dashboards/agm-group-dashboard.html` _(awaiting data)_ |
| `abels` | Abels Moving Services _(AGM)_ | Premium UK & intl removals · Royal Warrant | `dashboards/abels-dashboard.html` |
| `bishops` | Bishop's Move _(AGM)_ | UK removals & storage · est. 1854 | `dashboards/bishops-move-dashboard.html` _(awaiting data)_ |
| `gerson` | Gerson Relocation _(AGM)_ | Corporate / global mobility | `dashboards/gerson-relocation-dashboard.html` |
| `gms` | Gerson Moving Services (GMS) _(AGM)_ | Consumer / domestic removals | `dashboards/gms-dashboard.html` _(awaiting data)_ |

> **AGM portfolio:** `abels`, `bishops`, `gerson` and `gms` all belong to the **AGM Relocation Limited** group. The master reference is `clients/agm/brand-context.md` — read it for group context (agencies, stakeholders, cross-brand workstreams) before brand work. AGM commercial data is internal-only.

## Onboarding a new client

Copy the template, then fill in the profile:

```
cp -r clients/_template clients/<slug>
```

Then edit `clients/<slug>/profile.md`. Or just ask: **"onboard a new client called <name>"** and the agents will scaffold it for you.
