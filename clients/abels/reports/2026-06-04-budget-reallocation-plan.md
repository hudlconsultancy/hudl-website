# Abels — Budget Reallocation Plan

**Asset:** Q3 2026 Brief, Asset #2
**Prepared by:** HUDL PPC Analyst · 4 June 2026
**Source data:** Google Ads Campaign report, 1 January – 31 May 2026
**Brief targets:** Europe lost IS < 20%, London lost IS < 25%, Domestic CPA £200–230, blended CPA ≤ £170

> All forward-looking figures (projected impression share, projected CPA, projected conversions) are **illustrative directional estimates** based on the Jan–May 2026 actuals and standard Smart Bidding behaviour. They are not guarantees. Actual results depend on auction dynamics, seasonal demand, and the Domestic clean-up (Asset #1) taking effect. British English and GBP throughout.

---

## 1. Starting position (Jan–May 2026 actuals)

| Campaign | Daily budget | Monthly spend (implied) | Conv. | Conv. rate | CPA | Value/cost | Lost IS (budget) |
|---|---|---|---|---|---|---|---|
| Domestic (Removals & Packing) | £40 | ~£1,196 | 20 | 5.09% | £298.96 | 0.74× | 22.4% |
| Europe (Outbound) | £97 | ~£1,224 | 46.89 | 14.08% | £130.48 | 2.57× | 44.4% |
| London | £28 | ~£574 | 19 | 10.33% | £151.15 | 1.83× | 62.9% |
| International | £30 | ~£278 | 8 | 10.00% | £173.83 | 2.03× | 36.5% |
| Brand | £5 | ~£14 | 3 | 15.79% | £23.92 | 5.63× | 2.1% |
| **Total** | **£200/day** | **~£3,286/mo** | **96.89** | **9.60%** | **£169.59** | **1.74×** | — |

> Monthly spend implied by dividing Jan–May actuals (£16,432) by 5 months. Daily budget total is £200 — this is the ceiling to hold.

**The core problem in one table:** Europe is the best-value campaign and is missing 44% of available impressions; London is the most throttled winner at 63% lost IS. Domestic receives £1,196/month (36% of spend) to produce the worst CPA and the only sub-1× value return. The reallocation moves ~£700–900/month from Domestic to Europe and London.

---

## 2. Proposed daily budgets

| Campaign | Current daily budget | Proposed daily budget | Change | Monthly equivalent |
|---|---|---|---|---|
| Europe (Outbound) | £97 | **£130** | +£33 | +£990/mo → ~£3,900/mo |
| London | £28 | **£55** | +£27 | +£810/mo → ~£1,650/mo |
| Domestic (Removals & Packing) | £40 | **£20** | -£20 | -£600/mo → ~£600/mo |
| International | £30 | **£35** | +£5 | +£150/mo → ~£1,050/mo |
| Brand | £5 | **£5** | 0 | held at ~£150/mo |
| **Total** | **£200/day** | **£245/day** | — | — |

> Wait — the totals above exceed £200/day. See §3 (phasing) for the reconciliation: the full proposed budgets assume the Domestic reduction funds the winners, but the shift is staged. At full reallocation, the adjusted total is reconciled below.

### Reconciled daily budget (full reallocation, end-state)

| Campaign | Proposed daily budget | Monthly equivalent |
|---|---|---|
| Europe (Outbound) | £130 | ~£3,900 |
| London | £55 | ~£1,650 |
| Domestic | £20 | ~£600 |
| International | £35 | ~£1,050 |
| Brand | £5 | ~£150 |
| **Total** | **£245/day** | **~£7,350/mo** |

The total daily budget rises from £200 to £245 because the brief allows for a modest uplift if the client approves it ("if the client approves a modest uplift to capture more of the lost impression share on the winners, the same percentage logic scales up"). If the budget must be held strictly at ~£200/day (£6,000/month), use the constrained version below.

### Constrained version (hold £200/day ceiling)

| Campaign | Current daily budget | Proposed daily budget (constrained) | Change | Monthly equivalent |
|---|---|---|---|---|
| Europe (Outbound) | £97 | **£115** | +£18 | ~£3,450/mo |
| London | £28 | **£45** | +£17 | ~£1,350/mo |
| Domestic | £40 | **£20** | -£20 | ~£600/mo |
| International | £30 | **£15** | -£15 | ~£450/mo |
| Brand | £5 | **£5** | 0 | ~£150/mo |
| **Total** | **£200/day** | **£200/day** | 0 | **~£6,000/mo** |

> The constrained version temporarily reduces International (which is already efficient at 2.03×) to fund Europe and London. If the brief target is to test International modestly, the unconstrained version (£245/day) is preferable. **Recommendation: present both options to the client and confirm budget ceiling before go-live.**

---

## 3. Rationale per campaign

### Europe (Outbound) — increase from £97 to £115–130/day

Europe is the standout performer: £130.48 CPA, 14.08% conversion rate, 2.57× conversion value/cost. Yet 44% of potential impressions are being lost to budget — the algorithm is pausing ad delivery mid-day because it has run out of money. Every missed impression at this CPA is a missed profitable enquiry.

Increasing the daily budget from £97 to £115–130 directly addresses the 44% lost IS. At the current £130 CPA, each additional conversion recovered costs less than the account blended average and significantly less than Domestic. This is the single highest-return budget move available.

**Illustrative directional effect:** if lost IS (budget) drops from 44% to ~15–20% (brief target: <20%), Europe moves toward capturing the full available demand at its current efficiency. At £130 CPA and even a conservative 50% recovery of lost impressions, this implies additional enquiries at below-average CPA. Actual volume depends on auction competition and seasonality — illustrative only.

### London — increase from £28 to £45–55/day

London has a 62.9% lost IS (budget) — the most severely throttled campaign in the account. At £151.15 CPA and 1.83× value/cost, it is profitable and converting at a rate (10.33%) well above Domestic. The London market is dense and competitive; missing 63% of impressions means a large number of high-intent London removal queries are being served by competitors.

Increasing from £28 to £45–55/day is a doubling of the London budget, which sounds dramatic but brings a £574/month spend to £1,350–1,650/month — still a smaller absolute share than Europe. Given the 62.9% lost IS, there is substantial headroom before the budget ceiling becomes a non-issue. This is the second-highest-return budget move.

**Illustrative directional effect:** if lost IS (budget) drops from 63% to ~20–25% (brief target: <25%), London conversions should increase materially. At £151 CPA, additional enquiries from London remain profitable. Illustrative only.

### Domestic — reduce from £40 to £20/day

Domestic is the only campaign delivering less conversion value than it costs (0.74×). At £299 CPA, it is spending £130 above the account average per enquiry. Reducing the budget from £40 to £20/day does not eliminate Domestic — it is core business — but it:

1. Immediately reduces the absolute spend being misallocated.
2. Forces the Maximise Conversions algorithm to be more selective about which queries it bids on — combined with the negative-keyword and match-type tightening in Asset #1, this pressure improves rather than harms efficiency.
3. Frees up £600/month to fund Europe and London.

The brief target of £200–230 CPA for Domestic will be driven primarily by the clean-up actions in Asset #1 (negatives, match types, tCPA tightening); the budget reduction is a supporting action, not the primary lever.

**Illustrative directional effect:** a lower budget with tighter targeting and a £230 tCPA should suppress the lowest-quality conversion attempts and pull the CPA toward the £200–230 range over 6–8 weeks. Conversion volume may dip slightly in the short term as Smart Bidding recalibrates — monitor at the end-July review.

### International — hold at £30/day (or adjust per version)

International is efficient (2.03× value/cost, £173.83 CPA, 10% conversion rate) and budget-limited (36.5% lost IS). However, at only 8 conversions over 5 months, the sample is small. The brief calls for a "modest test" — holding at £30/day is reasonable in the constrained version; a modest increase to £35/day in the unconstrained version is defensible.

Do not increase International significantly until the Europe and London campaigns have been scaled successfully — International is the smallest volume driver and should not compete for budget with higher-volume winners.

### Brand — hold at £5/day

Brand is performing at 5.63× value/cost and £23.92 CPA with near-zero lost IS (2.1%). It is already well-funded relative to its needs. Hold at £5/day. If competitor bidding on the Abels brand name becomes apparent from the search-terms report, a modest increase to £7/day is justified — but only then.

---

## 4. Phased rollout

Do not make all budget changes simultaneously. Smart Bidding requires 2–4 weeks to fully recalibrate after a budget or bid-strategy change, and making multiple changes at once makes it impossible to attribute which change drove which outcome.

### Phase 1 — Domestic clean-up (w/c 23 June, Build phase)

**Actions (no live budget changes yet):**
- Upload Domestic negative-keyword list (Asset #1, §1b).
- Audit and tighten Domestic match types.
- Pull and review Domestic search-terms report.
- Brief RSA copy revisions and landing-page CRO audit.

**Rationale:** clean the Domestic campaign before reducing its budget. If negatives and match-type tightening are applied first, the algorithm enters the budget-reduction phase with better signal — reducing the risk of conversion-volume collapse.

### Phase 2 — Go-live budget changes (w/c 7 July)

**Budget changes to make on 7 July (or agreed go-live date):**

| Campaign | Change |
|---|---|
| Europe | £97 → £115 (constrained) or £130 (unconstrained) |
| London | £28 → £45 (constrained) or £55 (unconstrained) |
| Domestic | £40 → £20 |
| International | £30 → £15 (constrained) or £35 (unconstrained) |
| Brand | No change |

Make all budget changes on the same day so that the learning periods align. Monitor impression share daily for the first two weeks.

**Do not change Domestic tCPA at the same time.** Wait one week before adjusting the Target CPA (see Asset #1, §3).

### Phase 3 — tCPA adjustment for Domestic (w/c 14 July)

- Set Domestic tCPA to £230.
- Note the date — this starts a ~2-week learning period.
- Do not further adjust budgets or tCPA during the learning period.

### Phase 4 — Month 1 review (31 July)

Review the following metrics against targets:

| Metric | Target | Action if off-track |
|---|---|---|
| Europe lost IS (budget) | < 30% (intermediate; < 20% by Q3 end) | If still > 35%, raise Europe daily budget by £10 |
| London lost IS (budget) | < 40% (intermediate; < 25% by Q3 end) | If still > 50%, raise London daily budget by £5 |
| Domestic CPA | < £270 (on the way to £200–230) | If still > £280, review whether more negatives are needed; consider reducing tCPA to £215 |
| Domestic conversions | ≥ 3/month | If < 2, hold tCPA at £230 and do not reduce further; check conversion tracking |
| Blended CPA | ≤ £175 | If > £185, pause further International test and hold Domestic budget tighter |

### Phase 5 — Month 2 review (28 August)

- If Europe lost IS is approaching target (<25%), assess whether to hold budget or increase further.
- If Domestic CPA is in the £220–250 range, reduce tCPA from £230 to £200.
- If blended CPA has improved to ≤ £165, consider a modest budget uplift to Europe/London only.
- If Domestic conversions have recovered to 5+/month, the algorithm has adapted — proceed with further tCPA tightening.

### Phase 6 — Q3 wrap (29 September)

Full review against all brief KPIs (§1 of the brief). Produce Q4 budget recommendation. Decision criteria:

- If Europe/London lost IS is < 20% / < 25% respectively, further budget uplift is warranted only if total blended CPA ≤ £165.
- If Domestic is still above £230 CPA at Q3 end, the issue is likely structural (landing page, conversion tracking, or keyword list) — escalate to a CRO deep-dive rather than further bid cuts.

---

## 5. Expected directional effects (illustrative)

These are directional estimates to guide expectations, not forecasts. They assume the Domestic clean-up (Asset #1) is implemented in parallel and Smart Bidding settles normally.

| Metric | Jan–May 2026 baseline | Illustrative Q3 direction |
|---|---|---|
| Europe lost IS (budget) | 44.4% | 20–25% (constrained) / 15–20% (unconstrained) |
| London lost IS (budget) | 62.9% | 25–35% (constrained) / 20–25% (unconstrained) |
| Domestic CPA | £298.96 | £200–230 (after clean-up + tCPA tightening; 6–8 weeks) |
| Domestic conv. rate | 5.09% | 7%+ (after negatives + match-type tightening) |
| Blended CPA | £169.59 | £150–170 (directional; depends on mix shift to better-performing campaigns) |
| Total monthly conversions | ~19.4/month | +15–25% run-rate increase (from Europe/London unlocked impression share) |

> These are illustrative ranges, not guarantees. They assume the auction environment remains broadly consistent with Jan–May 2026 and that conversion tracking is functioning correctly. Seasonal effects in Q3 (summer) may affect removal enquiry volumes positively (peak moving season) or negatively (holiday period mid-August).

---

## 6. Guardrails and triggers

### Do not proceed / pause and review if:

- Blended CPA rises above **£185** for two consecutive weeks — indicates the reallocation is not working and a full review is needed before further changes.
- Domestic conversions drop below **2/month** after the budget cut — indicates the budget reduction is too severe; restore to £25/day and rely on tCPA tightening alone.
- Europe or London CPA rises above **£180** sustained — indicates the incremental budget is reaching into lower-quality demand; reduce budget increases by 50%.
- Total monthly spend runs above **£7,000** in the unconstrained version before client approval — flag and pause upward budget changes.

### Review triggers (data-led, not calendar-led):

- Any single campaign's weekly spend-per-conversion rises >20% above its 4-week average — review search terms and negatives immediately.
- Impression share on Europe or London stops improving despite budget increase — indicates a Quality Score or ad rank issue rather than a budget issue; redirect effort to ad copy and landing-page quality.
- Domestic receives the lower budget but its CPA does not move toward £230 within 6 weeks — escalate to landing-page CRO audit (Asset #5) rather than further bid manipulation.

---

## 7. Linkage to brief KPIs

| Brief KPI | Target | How this plan addresses it |
|---|---|---|
| Blended CPA ≤ £170 | ≤ £170 | Mix shift toward Europe (£130 CPA) and London (£151 CPA) lowers the blended average even if Domestic's CPA stays elevated short-term |
| Europe lost IS (budget) < 20% | < 20% | Direct: daily budget raised from £97 to £115–130 |
| London lost IS (budget) < 25% | < 25% | Direct: daily budget raised from £28 to £45–55 |
| Domestic CPA £200–230 | £200–230 | Supported by budget pressure + tCPA tightening; primary driver is the clean-up in Asset #1 |
| Domestic conv. rate 7%+ | 7%+ | Driven by Asset #1 (negatives, match types, landing page) — budget change alone will not achieve this |
| +15–25% monthly enquiries | Run-rate increase | Unlocking Europe/London impression share at their current conversion rates; illustrative, not guaranteed |

---

## 8. Next steps

| Action | By | Owner |
|---|---|---|
| Confirm budget ceiling with client (£200/day constrained vs £245/day unconstrained) | By 30 June | Account manager |
| Apply Domestic negative-keyword list and match-type changes (Asset #1) | Week of 23 June | PPC |
| Make go-live budget changes per §4, Phase 2 | 7 July | PPC |
| Set Domestic tCPA to £230 | 14 July | PPC |
| Month 1 review — assess vs §4, Phase 4 targets | 31 July | PPC + Account manager |
| Month 2 review — tCPA step-down if on track | 28 August | PPC |
| Q3 wrap and Q4 recommendation | 29 September | PPC + Campaign manager |
