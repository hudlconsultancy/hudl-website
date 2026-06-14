/**
 * HUDL — Kinetic scroll hero (vanilla port of the design's Variant B engine).
 *
 * Splits the headline into per-letter spans, scatters them with a seeded PRNG,
 * and assembles them on scroll (spin-converge). Supporting copy fades up as the
 * headline lands. Honours prefers-reduced-motion and degrades to a static hero
 * when JS is unavailable.
 *
 * Reference maths: README §7–8 and hero-kinetic.jsx (HeroStage / ScrollHero).
 */
(function () {
  'use strict';

  var HUDL_COLORS = ['#fbbf46', '#45aeff', '#ff515e', '#1edfd4'];

  // Variant B — "spin converge"
  var CFG = { span: 0.26, spread: 0.52, rot: 430, minScale: 0.2 };
  // Assembly completes at 62% of the scroll runway, then holds while pinned.
  var ASSEMBLE_AT = 0.62;

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
    if (!stage || !h1) { return; }

    // Tokenise the headline into words -> letters, applying the HUDL colour rule.
    var text = h1.textContent.trim();
    h1.textContent = '';
    var words = text.split(/\s+/);
    var letters = [];

    words.forEach(function (word, wi) {
      var wordSpan = document.createElement('span');
      wordSpan.className = 'kh-word';
      var clean = word.replace(/[^A-Za-z0-9]/g, '').toUpperCase();
      var isHudl = clean === 'HUDL';
      var hi = 0;

      Array.prototype.forEach.call(word, function (ch) {
        var isLetter = /[A-Za-z0-9]/.test(ch);
        var span = document.createElement('span');
        span.className = 'kh-letter';
        span.textContent = ch;
        if (isHudl && isLetter) { span.style.color = HUDL_COLORS[hi % 4]; hi++; }
        wordSpan.appendChild(span);
        letters.push({ el: span });
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

    // Seed mirrors the reference: base seed 7 + variant.length*13 ('spin' => 4).
    var rand = mulberry32(7 + 4 * 13);
    letters.forEach(function (L) {
      L.dx = rand() * 2 - 1;
      L.dy = rand() * 2 - 1;
      L.rs = rand() < 0.5 ? -1 : 1;
      L.rj = 0.6 + rand() * 0.4;
    });

    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) {
      // Letters already sit in their natural (assembled) positions. Just mark
      // the static state and leave the supporting copy visible.
      hero.classList.add('kh-static');
      return;
    }

    hero.classList.add('is-animating');

    var dimW = 0;
    var dimH = 0;

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
        var delay = count > 1 ? (i / (count - 1)) * CFG.span : 0;
        var raw = clamp01((progress - delay) / (1 - CFG.span));
        var local = easeOutCubic(raw);
        var inv = 1 - local;

        var tx = L.dx * spreadX * inv;
        var ty = L.dy * spreadY * inv;
        var rot = L.rs * CFG.rot * L.rj * inv;
        var sc = 1 - inv * (1 - CFG.minScale);

        L.el.style.transform = 'translate3d(' + tx.toFixed(1) + 'px,' + ty.toFixed(1) + 'px,0) rotate(' + rot.toFixed(1) + 'deg) scale(' + sc.toFixed(3) + ')';
        L.el.style.opacity = (0.34 + 0.66 * local).toFixed(3);
        var blur = inv > 0.02 ? inv * 5 : 0;
        L.el.style.filter = blur ? 'blur(' + blur.toFixed(1) + 'px)' : 'none';
      }

      revealCopy(eyebrow, progress, 0.55);
      revealCopy(subline, progress, 0.62);
      revealCopy(actions, progress, 0.72);
      if (hint) { hint.style.opacity = progress < 0.96 ? '1' : '0'; }
    }

    function update() {
      var rect = hero.getBoundingClientRect();
      var total = hero.offsetHeight - window.innerHeight;
      var scrolled = clamp01(-rect.top / (total || 1));
      render(clamp01(scrolled / ASSEMBLE_AT));
    }

    var ticking = false;
    function onScroll() {
      if (ticking) { return; }
      ticking = true;
      requestAnimationFrame(function () { ticking = false; update(); });
    }

    measure();
    update();

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', function () { measure(); update(); });

    // Re-measure once webfonts have settled so sizing/positions stay accurate.
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
