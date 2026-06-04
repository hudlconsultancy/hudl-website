#!/usr/bin/env node
/**
 * generate-cover.js — Branded SVG cover generator for HUDL blog posts.
 *
 * For each markdown post that has no `thumbnail:` in its frontmatter, this:
 *   1. Reads the title + category.
 *   2. Writes an on-brand SVG cover to images/uploads/<slug>.svg
 *      (dark theme, four-colour HUDL stripe, category badge, title, hudl.gg mark).
 *   3. Injects `thumbnail: /images/uploads/<slug>.svg` into the frontmatter.
 *
 * Usage:
 *   node scripts/generate-cover.js <file.md> [<file.md> ...]   # specific files
 *   node scripts/generate-cover.js --all                       # every md in _posts and _drafts
 *
 * No dependencies — plain Node. Safe to run repeatedly (skips posts that
 * already have a thumbnail).
 */

const fs = require('fs');
const path = require('path');

const ROOT = path.resolve(__dirname, '..');
const UPLOADS_DIR = path.join(ROOT, 'images', 'uploads');

// Brand palette (matches CLAUDE.md / blog.html)
const COLOURS = {
  yellow: '#fbbf46',
  blue:   '#45aeff',
  red:    '#ff515e',
  cyan:   '#1edfd4',
  bg:     '#0c0c0c',
  white:  '#ffffff',
};

// Category → accent colour + label (matches blog.html badge styling)
const CATEGORY = {
  'case-study':         { colour: COLOURS.yellow, label: 'CASE STUDY' },
  'marketing-tips':     { colour: COLOURS.blue,   label: 'MARKETING TIPS' },
  'industry-insights':  { colour: COLOURS.cyan,   label: 'INDUSTRY INSIGHTS' },
};

function parseFrontmatter(raw) {
  const m = raw.match(/^---\n([\s\S]*?)\n---/);
  if (!m) return null;
  const meta = {};
  m[1].split('\n').forEach(line => {
    const idx = line.indexOf(':');
    if (idx === -1) return;
    const key = line.slice(0, idx).trim();
    const val = line.slice(idx + 1).trim().replace(/^["']|["']$/g, '');
    if (key) meta[key] = val;
  });
  return { meta, fmBlock: m[0], fmInner: m[1] };
}

function slugFromFilename(file) {
  return path.basename(file).replace(/^\d{4}-\d{2}-\d{2}-/, '').replace(/\.md$/, '');
}

function xmlEscape(s) {
  return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;').replace(/'/g, '&apos;');
}

// Greedy word-wrap to a max characters-per-line budget; caps at maxLines.
function wrapTitle(title, maxChars = 17, maxLines = 4) {
  const words = title.replace(/\s+/g, ' ').trim().split(' ');
  const lines = [];
  let cur = '';
  for (const w of words) {
    const candidate = cur ? cur + ' ' + w : w;
    if (candidate.length > maxChars && cur) {
      lines.push(cur);
      cur = w;
    } else {
      cur = candidate;
    }
  }
  if (cur) lines.push(cur);
  if (lines.length > maxLines) {
    const kept = lines.slice(0, maxLines);
    kept[maxLines - 1] = kept[maxLines - 1].replace(/[.,;:]$/, '') + '…';
    return kept;
  }
  return lines;
}

function buildSvg(title, category) {
  const W = 1200, H = 675;
  const cat = CATEGORY[category] || { colour: COLOURS.blue, label: (category || '').toUpperCase() };
  const lines = wrapTitle(title.toUpperCase());

  // Title block sizing — shrink font a touch when there are many lines.
  const fontSize = lines.length >= 4 ? 78 : lines.length === 3 ? 88 : 96;
  const lineHeight = fontSize * 1.02;
  const titleBlockH = lines.length * lineHeight;
  const titleStartY = (H / 2) - (titleBlockH / 2) + fontSize * 0.78 + 20;

  const titleTspans = lines.map((ln, i) =>
    `<tspan x="80" y="${(titleStartY + i * lineHeight).toFixed(1)}">${xmlEscape(ln)}</tspan>`
  ).join('');

  const fontStack = "'Barlow Condensed','Arial Narrow','Helvetica Neue',Impact,sans-serif";

  return `<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="${H}" viewBox="0 0 ${W} ${H}" role="img" aria-label="${xmlEscape(title)}">
  <defs>
    <linearGradient id="bg" x1="0" y1="0" x2="1" y2="1">
      <stop offset="0" stop-color="#101010"/>
      <stop offset="1" stop-color="#000000"/>
    </linearGradient>
  </defs>
  <rect width="${W}" height="${H}" fill="url(#bg)"/>

  <!-- four-colour stripe bar -->
  <g>
    <rect x="0" y="0" width="${W/4}" height="12" fill="${COLOURS.yellow}"/>
    <rect x="${W/4}" y="0" width="${W/4}" height="12" fill="${COLOURS.blue}"/>
    <rect x="${W/2}" y="0" width="${W/4}" height="12" fill="${COLOURS.red}"/>
    <rect x="${3*W/4}" y="0" width="${W/4}" height="12" fill="${COLOURS.cyan}"/>
  </g>

  <!-- category badge -->
  <g font-family="${fontStack}" font-weight="700">
    <rect x="80" y="86" width="${24 + cat.label.length * 13.5}" height="34" rx="2" fill="${cat.colour}" opacity="0.16"/>
    <text x="92" y="110" font-size="20" letter-spacing="2" fill="${cat.colour}">${xmlEscape(cat.label)}</text>
  </g>

  <!-- title -->
  <text font-family="${fontStack}" font-weight="800" font-size="${fontSize}" fill="${COLOURS.white}" letter-spacing="0.5" style="text-transform:uppercase">${titleTspans}</text>

  <!-- hudl.gg wordmark -->
  <g font-family="${fontStack}" font-weight="900" font-size="34" letter-spacing="3">
    <text x="80" y="${H - 56}">
      <tspan fill="${COLOURS.yellow}">H</tspan><tspan fill="${COLOURS.blue}">U</tspan><tspan fill="${COLOURS.red}">D</tspan><tspan fill="${COLOURS.cyan}">L</tspan><tspan fill="${COLOURS.white}" font-size="20" letter-spacing="1"> .GG</tspan>
    </text>
  </g>

  <!-- corner stripe accent (bottom-right) -->
  <g opacity="0.9">
    <rect x="${W-200}" y="${H-12}" width="44" height="12" fill="${COLOURS.yellow}"/>
    <rect x="${W-152}" y="${H-12}" width="44" height="12" fill="${COLOURS.blue}"/>
    <rect x="${W-104}" y="${H-12}" width="44" height="12" fill="${COLOURS.red}"/>
    <rect x="${W-56}" y="${H-12}" width="44" height="12" fill="${COLOURS.cyan}"/>
  </g>
</svg>
`;
}

function processFile(file) {
  const abs = path.isAbsolute(file) ? file : path.join(ROOT, file);
  if (!fs.existsSync(abs)) { console.warn(`! skip (not found): ${file}`); return; }
  const raw = fs.readFileSync(abs, 'utf8');
  const parsed = parseFrontmatter(raw);
  if (!parsed) { console.warn(`! skip (no frontmatter): ${file}`); return; }

  if (parsed.meta.thumbnail) {
    console.log(`= already has thumbnail: ${path.basename(file)}`);
    return;
  }

  const title = parsed.meta.title || 'Untitled';
  const category = parsed.meta.category || '';
  const slug = slugFromFilename(file);

  // 1. write SVG
  fs.mkdirSync(UPLOADS_DIR, { recursive: true });
  const svgRel = `/images/uploads/${slug}.svg`;
  fs.writeFileSync(path.join(UPLOADS_DIR, `${slug}.svg`), buildSvg(title, category));

  // 2. inject thumbnail into frontmatter (append as last key inside the block)
  const newFmInner = parsed.fmInner + `\nthumbnail: ${svgRel}`;
  const newRaw = raw.replace(parsed.fmBlock, `---\n${newFmInner}\n---`);
  fs.writeFileSync(abs, newRaw);

  console.log(`+ cover generated: ${slug}.svg  →  ${path.basename(file)}`);
}

// ── main ──
const args = process.argv.slice(2);
let files = [];
if (args.includes('--all') || args.length === 0) {
  for (const dir of ['_posts', '_drafts']) {
    const d = path.join(ROOT, dir);
    if (fs.existsSync(d)) {
      files.push(...fs.readdirSync(d).filter(f => f.endsWith('.md')).map(f => path.join(dir, f)));
    }
  }
} else {
  files = args;
}

files.forEach(processFile);
console.log(`\nDone. Processed ${files.length} file(s).`);
