# Abels — Domestic Campaign Clean-Up Pack

**Asset:** Q3 2026 Brief, Asset #1
**Campaign:** JDR Search | Domestic (Removals & Packing)
**Prepared by:** HUDL PPC Analyst · 4 June 2026
**Source data:** Google Ads Campaign report, 1 January – 31 May 2026
**Status:** Ready for implementation (pending search-terms-report review — see §5)

> All forward-looking figures are illustrative. British English and GBP throughout.

---

## Context & the problem in one paragraph

Domestic is the second-largest campaign by spend (£5,979 over five months, ~36% of Search budget) yet the worst performer by every commercial metric: 5.09% conversion rate, £298.96 CPA, and 0.74× conversion value/cost — meaning Google's own attributed value of enquiries is less than we are paying to generate them. The account blended CPA is £169.59. The brief target for Domestic is £200–230 CPA and 7%+ conversion rate. The diagnosis is **query quality, not segment viability**: Domestic serves high-value, high-intent home-removal searches, but the current keyword and match-type setup is almost certainly bleeding spend on irrelevant queries. The fix is structural: negatives first, match types second, bid-strategy calibration third, landing-page/quote-path fourth.

---

## 1. Negative-keyword strategy

### 1a. Priority negative themes (add to campaign-level negative list immediately)

These are the most common waste categories for a UK home-removals Search campaign. Apply them now, before the search-terms report is available, as they are near-universal for this sector.

| Theme | Rationale | Example negatives to add |
|---|---|---|
| **Jobs & recruitment** | "removals jobs", "packing jobs", "driver jobs" trigger ads for job-seekers, not customers | jobs, job, careers, career, vacancy, vacancies, hiring, employment, apply, cv, salary, wages, driver jobs, removals driver |
| **DIY & self-service** | People hiring a van themselves or doing it themselves; no intent to book a professional mover | van hire, hire a van, van rental, man with van, man and van, self-move, self storage, storage unit, storage container, storage hire |
| **Free / cheap / low cost** | High-intent budget seekers unlikely to convert for a premium mover; distort CPA | free removal, free quote (consider — test carefully; could be ambiguous), cheap removal, cheapest, lowest cost, budget movers, cut price |
| **Single-item / small-item moves** | Not Abels' service model; low-value, high-friction enquiries | sofa removal, mattress removal, fridge removal, wardrobe removal, one item, single item, furniture disposal, item collection, courier, parcel, shipping a box |
| **Student moves** | High-volume search term, low move value, seasonal spike; not the target segment | student, students, university, uni, halls, accommodation, student removal, fresher |
| **International terms leaking into Domestic** | If the Domestic campaign is using broad or BMM keywords, international queries will bleed in; those should convert in Europe or International | moving to france, moving to spain, moving to germany, moving to europe, overseas removal, international removal, shipping abroad, expat move (check: if these are already negated at campaign level, confirm — if not, add) |
| **Local authority / council / social services** | "council removal", "council house move" — entirely different service context | council, local authority, housing association, social housing, benefits, housing benefit |
| **Packing materials / supplies only** | "buy packing boxes", "removal boxes", "bubble wrap" — product searches, not service | packing boxes, buy boxes, moving boxes, bubble wrap, packing tape, cardboard boxes, removal supplies |
| **Comparison / directory queries** | Serving a comparison or directory page, not an Abels page — low conversion probability even if clicked | compare removals, removals comparison, cheapest removal companies, removal company reviews, best removal company (test — could also be high intent), which removals company, removals near me (test carefully — can be intent-led) |
| **Clearance / waste / disposal** | "house clearance", "rubbish removal" — entirely different service | house clearance, garden clearance, rubbish removal, waste removal, junk removal, skip hire, clearance company |
| **Courier & freight** | Parcel/freight queries sometimes trigger on "removal" broad terms | courier, parcel delivery, freight, logistics company, haulage, shipping company |
| **Commercial / office** | Unless Abels actively serves commercial relocation in this campaign, office queries distort CPA | office removal, office relocation, commercial removal, business relocation, IT removal, office furniture |

### 1b. Negative-keyword list — ready to upload (campaign level)

The following is a working negative-keyword list compiled from the themes above. Add these as **broad-match negatives** at campaign level unless noted. Once the search-terms report is reviewed (see §5), this list will be extended with actuals.

```
jobs
job
career
careers
vacancy
vacancies
hiring
employment
apply
cv
salary
wages
driver jobs
van hire
hire a van
van rental
man with van
man and van
self storage
storage unit
storage hire
storage container
free removal
cheap removal
cheapest
cheapest removal
budget removal
cut price
sofa removal
mattress removal
fridge removal
wardrobe removal
single item
one item
furniture disposal
item collection
courier
parcel
shipping a box
student
students
university
uni
halls
fresher
student removal
moving to france
moving to spain
moving to germany
moving to europe
overseas removal
international removal
shipping abroad
expat move
council
local authority
housing association
social housing
housing benefit
packing boxes
buy boxes
moving boxes
bubble wrap
packing tape
cardboard boxes
house clearance
garden clearance
rubbish removal
waste removal
junk removal
skip hire
clearance company
office removal
office relocation
commercial removal
business relocation
IT removal
freight
haulage
parcel delivery
compare removals
cheapest removal companies
removal company reviews
```

> Note: "free quote" is intentionally excluded from the negative list — if Abels offers a free quote, this may be a positive term. Confirm with the client. If the quote is free, use "free quote" as a positive keyword or sitelink instead of negating it.

### 1c. Negative keyword lists — structure recommendation

- Create a **shared negative list** in Google Ads ("Domestic — Waste Themes") and apply it to the Domestic campaign. This makes it easier to add negatives globally as the search-terms report reveals new waste patterns.
- Keep international negatives in a separate shared list ("International Bleed") so it can be applied to Domestic without cluttering Europe/International campaign negatives.
- Brand terms (competitor brand names and Abels own brand) should be in a separate list if not already handled.

---

## 2. Match-type tightening

### Current position (inferred from data)

The Domestic campaign is running on Maximise Conversions (Target CPA) bidding. Without seeing the keyword list directly, the 5.09% conversion rate and 8,957 impressions vs 393 clicks (4.39% CTR) strongly suggest a significant proportion of spend is on broad-match or broad-match-modified keywords triggering irrelevant queries. The relatively low CTR (4.39%) and high spend-per-conversion ratio point to poor query/ad relevance on a portion of traffic.

### Recommendations

| Action | Detail | Priority |
|---|---|---|
| **Audit all broad-match keywords** | Pull the full keyword list. Any keyword set to broad match should be reviewed: does it need to be broad, or will phrase or exact match cover the same genuine intent? Broad match is only appropriate here if Smart Bidding has enough conversion data (typically 30+ conversions per month per campaign) to steer it well — Domestic is at 4 conversions/month, well below that threshold. | High |
| **Migrate core removal terms to phrase or exact** | For high-value, high-intent terms — "house removal [location]", "removal company [location]", "removals and packing", "professional removals" — move to phrase or exact match. This caps irrelevant expansions while Smart Bidding still has room to operate. | High |
| **Retain a limited broad-match layer for discovery** | Keep 2–3 broad-match keywords purely to discover new intent patterns — but negative-shield them tightly using the list in §1. Review their search terms weekly during the first 6 weeks. | Medium |
| **Avoid BMM (no longer available) and "old-style" broad** | Confirm no residual broad-match-modified syntax remains; it now behaves as phrase match but the intent may not have been updated. | Low |
| **Single keyword ad groups (SKAGs) for top terms** | For the 5–10 highest-spend keywords, consider splitting into tightly-themed ad groups with dedicated ad copy and landing pages. This improves Quality Score, which reduces CPC and improves ad rank at the same cost. | Medium (Q3 optimise phase) |

### Match-type hierarchy for Domestic (recommended)

```
Exact match:  [house removal london], [house removals], [removal company near me],
              [professional removal company], [removals and packing service]
Phrase match: "house removal", "removal company", "removals [city]",
              "professional removals", "furniture removal service"
Broad (discovery, tightly negated): removals, moving house
```

---

## 3. Target CPA guidance — Maximise Conversions (tCPA)

### Current situation

The Domestic campaign runs Maximise Conversions with a Target CPA set. Based on the data, the current tCPA appears to be set too loosely (or the campaign is in Max Conversions mode without a hard cap), allowing it to spend up to £299 per conversion. At 4 conversions per month, Smart Bidding has limited signal to work with.

### Recommended Target CPA settings

| Phase | Recommended tCPA | Rationale |
|---|---|---|
| **Immediately (from go-live)** | Set tCPA to **£230** | Signals to Google that above this, the campaign is unprofitable relative to the account. Leaves headroom for the algorithm to find conversions. Do not set to £170 immediately — too aggressive a cut risks throttling the campaign. |
| **After 4 weeks (end July review)** | If CPA has dropped to £220–240 range, reduce tCPA to **£200** | Let Smart Bidding re-learn at the new level. Monitor conversion volume; if it drops below 3/month, hold at £230. |
| **After 8 weeks (end August review)** | If performing at £190–210, reduce tCPA to **£180** and assess whether further budget reallocation is warranted | This is the stretch target; only move here if the campaign has demonstrated it can convert at the intermediate level. |

### Smart Bidding calibration notes

- **Do not change the tCPA and the budget at the same time.** The reallocation plan (Asset #2) reduces Domestic's daily budget. Do the budget change first (week of 7 July), allow 1–2 weeks for the algorithm to stabilise, then set the tCPA reduction.
- **Learning period:** each tCPA change triggers a ~2-week learning period. During this time, performance will be volatile — do not judge the campaign on week-1 data.
- **Conversion volume is the limiting factor.** At ~4 conversions/month, Smart Bidding is running on thin signal. The single most effective thing to improve Smart Bidding performance on Domestic is to improve conversion rate (see §4) — more conversions per click gives the algorithm more data to optimise against.
- **If conversion volume drops below 2/month after tCPA tightening**, consider temporarily reverting to Maximise Conversions (no tCPA floor) and relying on the negatives + match-type tightening to improve CPA manually, rather than forcing the algorithm.

---

## 4. Ad copy, landing page and quote form

### Ad copy (RSA) recommendations

The ad-copy brief for full RSA variants sits with the outreach-copywriter (Asset #6), but the following structural requirements should be applied to whatever copy is written:

- **Intent-mirroring:** headline 1 should reflect the specific query intent. For a "house removals" query, lead with "House Removals" or "Professional Home Movers" — not a generic "Abels Moving Services" brand headline.
- **Qualifier in headline 2–3:** use qualifiers that self-select the right customer and deter low-value clicks — e.g. "Established UK Removal Specialists", "Full-Service Packing & Moving", "No Man & Van — Expert Care". This naturally deters someone looking for a cheap single-item or self-service option.
- **Call to action with commitment language:** "Get a Quote Today", "Request Your Free Survey", "Plan Your Move With Us" — not "Click Here" or "Learn More".
- **Avoid over-promising:** do not use "cheapest", "guaranteed same-day", or specific price claims without a verified source (profile guardrail).
- **Pin at least one asset:** pin the most relevant headline in position 1 to ensure query relevance appears above the fold every time.

### Landing page

The brief (§2) notes ~44-second average sessions and a low GA4 key-event rate (~4.1%), which points to a weak conversion path on the Domestic landing page. Key checks:

| Issue to audit | What to look for | Fix |
|---|---|---|
| **Above-the-fold CTA** | Is a "Get a Quote" or "Request a Survey" CTA visible without scrolling on both desktop and mobile? | Move primary CTA above fold; make it visually distinct (use the Abels brand colour hierarchy). |
| **Query-to-page relevance** | Does the landing page reflect the specific service the user searched for? (e.g., a "removals and packing" query landing on a generic homepage vs a packing/removals page) | Create or differentiate Domestic-specific landing pages; align page headline to ad copy headline. |
| **Page load speed** | Slow pages (>3s on mobile) kill conversion rate; particularly impactful for paid search where the user can immediately hit Back. | Check Google PageSpeed Insights; compress images; defer non-critical scripts. |
| **Form length** | Long quote forms (>5 fields above the fold) have high abandonment rates. | Reduce initial form to: name, phone/email, move date (approx.), origin postcode, destination postcode. Collect detail post-submission. |
| **Trust signals** | Reviews, years established, accreditations visible near the CTA? | Add a short testimonial block or trust badge (e.g. BAR membership, Google reviews) near the quote form. |

### Quote-form recommendations

- **Two-step or progressive form:** collect the minimum needed (origin/destination/date/contact) on step 1, then ask for detail (property size, specific services) on step 2 after the user is already engaged. This significantly reduces abandonment.
- **Confirmation message:** after form submission, the confirmation page (thank-you.html) should reinforce: what happens next, when they will hear back, and a reassurance line ("We'll be in touch within [X] hours on working days"). This also makes GA4 goal completion reliable.
- **Phone number prominence:** for high-value moves, a meaningful proportion of users prefer to call. A click-to-call phone number at the top of the landing page captures this segment without requiring a form fill — and Google Ads can track calls as conversions.

---

## 5. Search-terms-report review checklist

> This section documents what to do when the Domestic search-terms report is pulled from Google Ads. This is the single most important action for finalising the negative list above — the analysis in §1 is based on sector knowledge and campaign structure inference; the actuals may reveal further waste.

**To pull:** Google Ads → Campaigns → Domestic campaign → Keywords → Search terms. Export as CSV. Filter date range to match the Jan–May 2026 campaign report period.

**Review checklist:**

- [ ] Sort by **cost (descending)**. Identify all search terms spending >£20 without a conversion.
- [ ] Sort by **impressions (descending)**. Flag any high-impression/zero-conversion terms that may not show much cost individually but in aggregate drain budget.
- [ ] Scan for **job/recruitment terms** (jobs, driver, vacancy, apply, cv). Add any found to the negative list.
- [ ] Scan for **van hire / self-service terms**. Add to negatives.
- [ ] Scan for **student / university** terms. Add to negatives.
- [ ] Scan for **single-item / small-item terms** (sofa, mattress, fridge, etc.). Add to negatives.
- [ ] Scan for **international leak terms** (moving to [country], overseas, expat). Confirm these are negated from Domestic.
- [ ] Scan for **house clearance / rubbish removal** terms. Add to negatives.
- [ ] Scan for **competitor brand terms** as search queries — if present, assess whether to negate or allow (some competitor queries are high intent; a dedicated competitor campaign or ad group is a separate decision).
- [ ] Identify **converting search terms** (>1 conversion). These are your highest-intent actual queries — consider making them exact-match keywords if they are not already.
- [ ] Note any **unexpected high-converting terms** that suggest new keyword opportunities (e.g. "piano removal", "antiques removal" — niche but high-value).
- [ ] After reviewing, add all waste terms to the campaign-level negative list ("Domestic — Waste Themes") in Google Ads.
- [ ] **Document the review** with a note in `clients/abels/reports/` (YYYY-MM-DD-domestic-search-terms-review.md) listing terms added and rationale.

**What this will unlock:** once the search-terms report confirms which queries are burning budget, the tCPA can be set more precisely (the algorithm will have fewer irrelevant conversion attempts to learn from), and the match-type migration will be safer (you can see exactly which queries the current broad terms are triggering).

---

## 6. Summary of actions and sequencing

| Step | Action | When | Owner |
|---|---|---|---|
| 1 | Upload §1b negative list to Domestic campaign (campaign-level negative list) | Week of 23 Jun (Build phase) | PPC |
| 2 | Audit Domestic keyword list; migrate broad-match core terms to phrase/exact | Week of 23 Jun | PPC |
| 3 | Reduce Domestic daily budget per reallocation plan (Asset #2) | w/c 7 Jul (go-live) | PPC |
| 4 | Set Domestic tCPA to £230 (wait 1 week after budget change before adjusting tCPA) | w/c 14 Jul | PPC |
| 5 | Pull search-terms report and complete §5 checklist; extend negative list | w/c 7 Jul | PPC |
| 6 | Review ad copy; brief RSA revisions to outreach-copywriter (Asset #6) | Week of 23 Jun | PPC + Content |
| 7 | Audit Domestic landing page against §4 checklist | Week of 23 Jun | PPC + outreach-copywriter |
| 8 | Implement quick-win CRO fixes (above-fold CTA, form length) | w/c 7 Jul | Web / outreach-copywriter |
| 9 | Review CPA at end of July; reduce tCPA to £200 if on track | Fri 31 Jul | PPC |
| 10 | Review CPA at end of August; reduce tCPA to £180 if on track | Fri 28 Aug | PPC |

---

## Data still needed to finalise this plan

1. **Search-terms report for Domestic (Jan–May 2026)** — the single most important missing input. Without it, the negative list is based on sector inference, not actuals. Request from the client's Google Ads account or pull directly.
2. **Current keyword list with match types** — to confirm which terms are broad vs phrase vs exact; allows precise match-type migration rather than inferred recommendations.
3. **Current tCPA setting** — the campaign report shows it is on Maximise Conversions (Target CPA) but does not state the target value. Confirm the current setting before adjusting.
4. **Landing-page URL(s) for Domestic** — to audit the quote path against the checklist in §4.
5. **Quote-form submission / thank-you page setup in GA4** — to confirm whether conversions are being tracked correctly and the form's current abandonment rate. A discrepancy between Google Ads conversions and GA4 key events would indicate a tracking issue.
