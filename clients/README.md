# Client Workspaces

Each HUDL client has a dedicated workspace under `clients/<slug>/`. This gives every agent a consistent place to **read context from** and **write deliverables to**, so work stays organised per client and nothing gets mixed up.

## Structure

```
clients/<slug>/
  profile.md     # Persistent client context — agents READ this first
  data/          # Campaign exports, CSVs, raw data
  reports/       # PPC analyses & performance summaries (ppc-analyst)
  content/       # Blog drafts & content for this client (content-writer)
  outreach/      # Emails, proposals, ad copy (outreach-copywriter)
```

Client dashboards still live in the top-level `dashboards/` folder (so they deploy with the site), but each `profile.md` links to the client's dashboard, password and storage key.

## How agents use a workspace

When you name a client, the agent should:
1. **Read `clients/<slug>/profile.md`** for the client's sector, services, tone, dashboard and current focus.
2. **Look in `data/`** for the latest exports to work from.
3. **Write its output into the matching subfolder** (`reports/`, `content/`, `outreach/`) with a dated filename, e.g. `reports/2026-06-04-ppc-review.md`.

Examples:
- `@ppc-analyst review the latest export for Abels` → reads `clients/abels/`, writes to `clients/abels/reports/`.
- `@content-writer draft a relocation guide for Gerson` → writes to `clients/gerson/content/`.

## Current clients

| Slug | Client | Sector | Dashboard |
|------|--------|--------|-----------|
| `hudl` | HUDL Consultancy _(our own)_ | UK marketing consultancy | _internal — blog ships to `/_posts`_ |
| `abels` | Abels Moving Services | UK removals & relocation | `dashboards/abels-dashboard.html` |
| `bishops` | Bishop's Move | UK removals & storage | `dashboards/bishops-move-dashboard.html` _(awaiting data)_ |
| `gerson` | Gerson Relocation | Corporate / global relocation | `dashboards/gerson-relocation-dashboard.html` |
| `gms` | GMS _(confirm name)_ | _to confirm_ | `dashboards/gms-dashboard.html` _(awaiting data)_ |
| `agm` | AGM Group _(confirm name)_ | _to confirm_ | `dashboards/agm-group-dashboard.html` _(awaiting data)_ |

## Onboarding a new client

Copy the template, then fill in the profile:

```
cp -r clients/_template clients/<slug>
```

Then edit `clients/<slug>/profile.md`. Or just ask: **"onboard a new client called <name>"** and the agents will scaffold it for you.
