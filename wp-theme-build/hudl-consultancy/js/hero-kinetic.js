/**
 * HUDL — Kinetic scroll hero · "Hyper HUDL" intro (vanilla port).
 *
 * Opening state: ONLY the four "HUDL" letters are on stage, hyper-scaled,
 * tilted and spread left->right (H·U·D·L), CENTRED in the viewport. As the
 * user scrolls, the HUDL letters shrink + untilt into their inline slot inside
 * the headline while the rest of the words fly in and spin-converge to spell
 * "LET'S HUDL TOGETHER AND GROW". Supporting copy fades up once it has landed.
 *
 * The giant HUDL cluster is re-centred on the stage (measured each layout), so
 * the opening reads centred and responsive at any screen size, then resolves
 * to the headline's natural (left-aligned) position as it assembles.
 *
 * Honours prefers-reduced-motion and degrades to a static hero with no JS.
 * Reference maths: README §7–8 and production-reference/hero-kinetic.js.
 */
(function () {
  'use strict';

  var HUDL_COLORS = ['#fbbf46', '#45aeff', '#ff515e', '#1edfd4'];

  // Hyper-sized intro anchors, one per HUDL letter (H, U, D, L).
  //   ax = horizontal offset as a fraction of stage WIDTH (spread within cluster)
  //   ay = vertical offset as a fraction of stage HEIGHT
  //   rot = start rotation (deg) · sc = start scale multiplier
  var GIANT = [
    { ax: -0.24, ay: -0.06, rot: -12, sc: 4.0 },  // H
    { ax: -0.05, ay:  0.08, rot:   8, sc: 4.4 },  // U
    { ax:  0.15, ay: -0.08, rot:  -6, sc: 4.1 },  // D
    { ax:  0.31, ay:  0.06, rot:  11, sc: 4.0 }   // L
  ];
  // Mean spread so the cluster can be re-centred (zero-mean spread around centre).
  var MEAN_AX = (GIANT[0].ax + GIANT[1].ax + GIANT[2].ax + GIANT[3].ax) / 4;
  var MEAN_AY = (GIANT[0].ay + GIANT[1].ay + GIANT[2].ay + GIANT[3].ay) / 4;

  var HUDL_ASSEMBLE = 0.78; // HUDL letters reach home at 78% of progress
  var ASSEMBLE_AT = 0.62;   // assembly completes at 62% of the scroll runway

  // The other (white) letters fly in from a seeded scatter and spin-converge.
  var CFG = { spread: 0.52, rot: 430, minScale: 0.3 };
  var CONVERGE_START = 0.26;  // hidden until here
  var CONVERGE_SPAN  = 0.30;  // per-letter stagger window

  function clamp01(v) { return v < 0 ? 0 : v > 1 ? 1 : v; }
  function easeOutCubic(t) { return 1 - Math.pow(1 - t, 3); }

  // Deterministic PRNG so the scatter is stable, not re-randomised each frame.
  function mulberry32(seed) {
    var a = seed >>> 0;
    return function () {
      a |= 0; a = (a + 0x6D2B79F5) | 0;
      var t = Math.imul(a ^ (a >>> 15), 1 | a);
      t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
      return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
    };
  }

  function init() {
    var hero = document.querySelector('.kh-hero');
    if (!hero) { return; }

    var stage = hero.querySelector('.kh-stage');
    var h1 = hero.querySelector('.kh-headline');
    var eyebrow = hero.querySelector('.kh-eyebrow');
    var subline = hero.querySelector('.kh-subline');
    var actions = hero.querySelector('.kh-actions');
    var hint = hero.querySelector('.kh-scrollhint');
    if (!stage || !h1) { hero.classList.remove('kh-prep'); return; }

    // Tokenise the headline into words -> letters, flagging the "HUDL" word.
    var text = h1.textContent.trim();
    h1.textContent = '';
    var words = text.split(/\s+/);
    var letters = [];
    var hudlLetters = [];
    var li = 0;

    words.forEach(function (word, wi) {
      var wordSpan = document.createElement('span');
      wordSpan.className = 'kh-word';
      var clean = word.replace(/[^A-Za-z0-9]/g, '').toUpperCase();
      var isHudlWord = clean === 'HUDL';
      var hi = 0;

      Array.prototype.forEach.call(word, function (ch) {
        var isLetter = /[A-Za-z0-9]/.test(ch);
        var span = document.createElement('span');
        span.className = 'kh-letter';
        span.textContent = ch;
        var isHudl = isHudlWord && isLetter;
        var rec = { el: span, i: li, isHudl: isHudl, hudlIndex: -1 };
        if (isHudl) {
          span.style.color = HUDL_COLORS[hi % 4];
          span.classList.add('kh-hudl');
          span.style.position = 'relative';
          span.style.zIndex = '5';
          rec.hudlIndex = hi;
          hi++;
          hudlLetters.push(rec);
        }
        wordSpan.appendChild(span);
        letters.push(rec);
        li++;
      });

      h1.appendChild(wordSpan);
      if (wi < words.length - 1) {
        var space = document.createElement('span');
        space.className = 'kh-space';
        space.setAttribute('aria-hidden', 'true');
        space.appendChild(document.createTextNode(' '));
        h1.appendChild(space);
      }
    });

    var count = letters.length;

    // Seeded scatter for the white letters (stable across frames).
    var rand = mulberry32(7 + 4 * 13);
    letters.forEach(function (L) {
      L.dx = rand() * 2 - 1;
      L.dy = rand() * 2 - 1;
      L.rs = rand() < 0.5 ? -1 : 1;
      L.rj = 0.6 + rand() * 0.4;
    });

    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) {
      // Letters already sit assembled; just reveal and bail (no scroll binding).
      hero.classList.add('kh-static');
      hero.classList.remove('kh-prep');
      return;
    }

    hero.classList.add('is-animating');

    var dimW = 0;
    var dimH = 0;
    var centerX = 0; // offset to bring the assembled HUDL cluster to stage centre
    var centerY = 0;

    function measure() {
      dimW = stage.clientWidth;
      dimH = stage.clientHeight;

      // Fluid headline size computed from the stage width (matches reference).
      var fs = Math.max(34, Math.min(dimW * 0.092, 168));
      h1.style.fontSize = fs + 'px';
      if (eyebrow) {
        eyebrow.style.fontSize = Math.max(11, fs * 0.105) + 'px';
        eyebrow.style.marginBottom = (fs * 0.18) + 'px';
      }
      if (subline) {
        subline.style.fontSize = Math.max(14, fs * 0.165) + 'px';
        subline.style.marginTop = (fs * 0.26) + 'px';
      }
      if (actions) { actions.style.marginTop = (fs * 0.3) + 'px'; }
      var btnSize = Math.max(12, fs * 0.13) + 'px';
      hero.querySelectorAll('.kh-btn-primary, .kh-btn-secondary').forEach(function (b) {
        b.style.fontSize = btnSize;
      });

      // Measure the HUDL letters' natural (untransformed) box to centre the
      // giant intro cluster on the stage. Clear their transform first so the
      // rects reflect pure layout, then the next render() re-applies them.
      if (hudlLetters.length) {
        for (var k = 0; k < hudlLetters.length; k++) { hudlLetters[k].el.style.transform = 'none'; }
        var sr = stage.getBoundingClientRect();
        var minX = Infinity, maxX = -Infinity, minY = Infinity, maxY = -Infinity;
        for (var j = 0; j < hudlLetters.length; j++) {
          var r = hudlLetters[j].el.getBoundingClientRect();
          if (r.left < minX) { minX = r.left; }
          if (r.right > maxX) { maxX = r.right; }
          if (r.top < minY) { minY = r.top; }
          if (r.bottom > maxY) { maxY = r.bottom; }
        }
        var clusterCx = (minX + maxX) / 2 - sr.left;
        var clusterCy = (minY + maxY) / 2 - sr.top;
        centerX = sr.width / 2 - clusterCx;
        centerY = sr.height / 2 - clusterCy;
      }
    }

    function revealCopy(el, progress, start) {
      if (!el) { return; }
      var rv = clamp01((progress - start) / (1 - start));
      el.style.opacity = rv.toFixed(3);
      el.style.transform = 'translateY(' + ((1 - rv) * 22).toFixed(1) + 'px)';
    }

    function render(progress) {
      var spreadX = dimW * CFG.spread;
      var spreadY = dimH * CFG.spread * 1.05;

      for (var i = 0; i < count; i++) {
        var L = letters[i];

        if (L.isHudl) {
          // Hyper-sized intro: centred giant cluster -> natural inline slot.
          var a = GIANT[L.hudlIndex] || GIANT[0];
          var local = easeOutCubic(clamp01(progress / HUDL_ASSEMBLE));
          var inv = 1 - local;
          // Centring offset + zero-mean spread, both fading out as it assembles.
          var gtx = (centerX + (a.ax - MEAN_AX) * dimW) * inv;
          var gty = (centerY + (a.ay - MEAN_AY) * dimH) * inv;
          var grot = a.rot * inv;
          var gsc = 1 + (a.sc - 1) * inv;
          L.el.style.transform = 'translate3d(' + gtx.toFixed(1) + 'px,' + gty.toFixed(1) + 'px,0) rotate(' + grot.toFixed(2) + 'deg) scale(' + gsc.toFixed(3) + ')';
          L.el.style.opacity = '1';
          L.el.style.filter = 'none';
          continue;
        }

        // Other letters: hidden at start, then fly in & spin-converge.
        var delay = count > 1 ? (L.i / (count - 1)) * CONVERGE_SPAN : 0;
        var rr = clamp01((progress - CONVERGE_START - delay) / (1 - CONVERGE_START - delay));
        var e = easeOutCubic(rr);
        var cinv = 1 - e;
        var tx = L.dx * spreadX * cinv;
        var ty = L.dy * spreadY * cinv;
        var crot = L.rs * CFG.rot * L.rj * cinv;
        var csc = 1 - cinv * (1 - CFG.minScale);
        L.el.style.transform = 'translate3d(' + tx.toFixed(1) + 'px,' + ty.toFixed(1) + 'px,0) rotate(' + crot.toFixed(1) + 'deg) scale(' + csc.toFixed(3) + ')';
        L.el.style.opacity = e.toFixed(3);
      }

      revealCopy(eyebrow, progress, 0.62);
      revealCopy(subline, progress, 0.80);
      revealCopy(actions, progress, 0.88);
      if (hint) { hint.style.opacity = progress < 0.96 ? '1' : '0'; }
    }

    // Monotonic "high-water mark": progress only moves forward, so scrolling
    // back to the top never replays the scramble.
    var peak = 0;
    function update() {
      var rect = hero.getBoundingClientRect();
      var total = hero.offsetHeight - window.innerHeight;
      var scrolled = clamp01(-rect.top / (total || 1));
      var target = clamp01(scrolled / ASSEMBLE_AT);
      if (target > peak) { peak = target; }
      render(peak);
    }

    var ticking = false;
    function onScroll() {
      if (ticking) { return; }
      ticking = true;
      requestAnimationFrame(function () { ticking = false; update(); });
    }

    measure();
    update();
    hero.classList.remove('kh-prep'); // reveal now that the first frame is set

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', function () { measure(); update(); });

    // Re-measure once webfonts have settled so sizing/centring stay accurate.
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(function () { measure(); update(); });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
