# Abels — GA4 Traffic Review & Data Note

**Date:** 4 June 2026
**Sources:** GA4 export (`abels-ga4-2026-01-01_2026-06-04.csv`), Google Ads campaign report (`abels-google-ads-campaign-report.csv`)
**Period (GA4):** 1 Jan – 4 Jun 2026 (155 days)

> Figures below are taken directly from the client's GA4 export. The dashboard's Overview and Website Traffic tabs have been refreshed with this data.

## Headline
Abels' site drew **12,633 active users** across 15,836 sessions in the first five months of 2026 — a healthy, steady flow, but **almost entirely new visitors** (12,404 new vs ~1,273 returning), which is normal for removals (people move infrequently) and underlines that the site is a **first-touch acquisition channel**.

## Key GA4 metrics
| Metric | Value |
|---|---|
| Active users | 12,633 |
| Sessions | 15,836 |
| Total users | 12,650 |
| New users | 12,404 |
| Returning users | ~1,273 |
| Engaged sessions per active user | 0.80 |
| Avg engagement time / session | 44.2s |
| Session key-event rate (grand total) | ~4.1% |

## What stands out
- **Strong start to the year.** The busiest days cluster in **January–early February** (peak 19 Jan: 222 users; 4 Feb: 211), consistent with New-Year moving intent. Traffic softens but stays consistent into spring.
- **Engagement is modest.** ~44s average and 0.80 engaged sessions/user suggests many visitors are quickly checking a single page (likely quote/contact or a service page). Worth reviewing landing-page clarity and the quote-request path.
- **Low return rate (~10%).** Expected for the sector, but it means **paid + organic acquisition does the heavy lifting** — there's little repeat traffic to lean on.
- **Key-event rate ~4.1%.** A few days spike far above this (e.g. 16–17 Feb), worth investigating for what drove them (campaign, PR, referral).

## ⚠️ Data note on the Google Ads file
The uploaded Ads report **can't be used for a campaign-level refresh** as-is:
- **All five campaign rows are zero** (Impr./Clicks/Cost/Conv. = 0). Only the account-level totals carry data.
- Those totals are **dominated by Performance Max**, not Search:
  - Account: £14,808 spend · 800.99 conv · £171,430 conv. value
  - Search: £3,364 spend · 310.95 conv
  - Performance Max: £11,444 spend · 490.03 conv
- The export header reads **"1 January 2025 – 3 June 2025"** — the wrong year/range or a filter was applied.

**Recommendation:** re-export from Google Ads as a **Campaign performance** report for **2026**, with per-campaign Clicks / Impr. / CTR / Avg. CPC / Cost / Conversions / Conv. rate / Cost-per-conv. (the same shape as the original `Campaign performance.csv`). Then either drop it into `clients/abels/data/` or upload it via the dashboard's **Upload New Data** button to refresh the PPC tab. The current PPC tab still shows the previous, valid per-campaign data.

## Suggested next steps
1. Get a clean 2026 Campaign performance CSV → refresh PPC tab + run a full waste/scale review.
2. Add **Search Console** export for 2026 to extend the Organic tab beyond April.
3. Review the **quote-request journey** given short engagement times.
