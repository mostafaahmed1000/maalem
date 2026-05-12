/**
 * Maalem – 3D Full-Page Scroll Engine
 * Cinematic scene-change experience: each section fills the viewport
 * and transitions with depth-based 3D animations.
 */
(function () {
  'use strict';

  /* ── CONFIG ─────────────────────────────────────────────────── */
  const DUR     = 800;  // transition ms
  const COOL    = 950;  // cooldown ms between navigations

  /* ── STATE ──────────────────────────────────────────────────── */
  let sections   = [];
  let cur        = 0;
  let busy       = false;       // true while animating
  let lastNav    = 0;           // timestamp of last navigation
  let touchY     = 0;
  let ready      = false;       // engine fully initialised

  /* ── TRANSITION PRESETS ─────────────────────────────────────── */
  // [startTransform, endTransform]  — index maps to section order
  const FX = {
    fromBottom:  ['translateY(60px) scale(0.96)',                           'translateY(0) scale(1)'],
    toTop:       ['translateY(0) scale(1)',                                'translateY(-60px) scale(0.96)'],
    fromRight:   ['translateX(100px) rotateY(-10deg) scale(0.9)',          'translateX(0) rotateY(0) scale(1)'],
    toLeft:      ['translateX(0) rotateY(0) scale(1)',                    'translateX(-100px) rotateY(10deg) scale(0.9)'],
    fromLeft:    ['translateX(-100px) rotateY(10deg) scale(0.9)',          'translateX(0) rotateY(0) scale(1)'],
    toRight:     ['translateX(0) rotateY(0) scale(1)',                    'translateX(100px) rotateY(-10deg) scale(0.9)'],
    fromBtm3d:   ['translateY(80px) rotateX(10deg) scale(0.92)',           'translateY(0) rotateX(0) scale(1)'],
    toTop3d:     ['translateY(0) rotateX(0) scale(1)',                    'translateY(-80px) rotateX(-10deg) scale(0.92)'],
    zoomIn:      ['translateZ(-200px) opacity(0)',                         'translateZ(0) opacity(1)'],
    zoomOut:     ['translateZ(0) opacity(1)',                              'translateZ(150px) opacity(0)'],
    flipIn:      ['rotateX(20deg) translateY(50px) scale(0.92)',           'rotateX(0) translateY(0) scale(1)'],
    flipOut:     ['rotateX(0) translateY(0) scale(1)',                    'rotateX(-20deg) translateY(-50px) scale(0.92)'],
    
    // Reverse helpers
    fromTop:     ['translateY(-60px) scale(0.96)',                         'translateY(0) scale(1)'],
    toBottom:    ['translateY(0) scale(1)',                                'translateY(60px) scale(0.96)'],
  };

  // Per-section enter/leave pair (forward direction)
  const PRESETS = [
    { in: 'fromBottom', out: 'toTop'    },   // 0  hero
    { in: 'fromRight',  out: 'toLeft'   },   // 1  vision
    { in: 'fromLeft',   out: 'toRight'  },   // 2  values
    { in: 'fromBtm3d',  out: 'toTop3d'  },   // 3  challenges
    { in: 'zoomIn',     out: 'zoomOut'  },   // 4  why maalem
    { in: 'fromRight',  out: 'toLeft'   },   // 5  who we are
    { in: 'fromLeft',   out: 'toRight'  },   // 6  service 1
    { in: 'flipIn',     out: 'flipOut'  },   // 7  service 2
    { in: 'fromBtm3d',  out: 'toTop3d'  },   // 8  service 3
    { in: 'zoomIn',     out: 'zoomOut'  },   // 9  courses
    { in: 'fromRight',  out: 'toLeft'   },   // 10 mooc
    { in: 'flipIn',     out: 'flipOut'  },   // 11 mentors
    { in: 'fromLeft',   out: 'toRight'  },   // 12 pricing
    { in: 'fromBtm3d',  out: 'toTop3d'  },   // 13 faq
  ];

  /* ── INIT ───────────────────────────────────────────────────── */
  function init() {
    // Don't start until preloader finishes
    const pre = document.getElementById('preloader');
    if (pre && !pre.classList.contains('hidden') && pre.style.display !== 'none') {
      let done = false;
      const go = () => { if (!done) { done = true; setTimeout(start, 700); } };
      const obs = new MutationObserver(() => {
        if (pre.classList.contains('hidden') || pre.style.display === 'none') {
          obs.disconnect(); go();
        }
      });
      obs.observe(pre, { attributes: true, attributeFilter: ['class', 'style'] });
      setTimeout(go, 6200); // hard fallback
    } else {
      start();
    }
  }

  function start() {
    if (ready) return;
    if (window.innerWidth < 768) return; // mobile: normal scroll

    sections = Array.from(document.querySelectorAll('main > section'));
    if (sections.length < 2) return;

    // Measure header so we can offset section content beneath it
    const headerEl = document.querySelector('header');
    const headerH  = headerEl ? headerEl.offsetHeight : 0;

    // Hide all sections, lock page scroll
    sections.forEach((s, i) => {
  s.style.cssText += `
    position:fixed !important;
    top:0 !important;
    left:0 !important;
    width:100% !important;
    height:100vh !important;
    margin:0 !important;
    border-radius:0 !important;
    border:none !important;
    overflow:hidden !important;
    opacity:0 !important;
    visibility:hidden !important;
    pointer-events:none !important;
    z-index:${i + 1} !important;
    will-change:transform,opacity;
    backface-visibility:hidden;
    transform:${FX.fromBottom[0]};
    transition:none;
  `;

  s.classList.remove('s3d-current');

  if (i !== 0) {
    s.style.paddingTop = (headerH + 40) + 'px';
    s.style.paddingBottom = '60px';
  }
});

    // Auto-scale long sections to fit the screen
    const applyScaling = () => {
      const vh = window.innerHeight;
      sections.forEach((s, i) => {
        if (s.id === 'footer-section') return;

        const container = Array.from(s.children).find(child => child.classList?.contains('container'));
        if (!container) return;
        
        // Reset scale to measure natural height
        container.style.transform = 'none';
        container.style.transformOrigin = 'top center';
        
        const contentH = container.offsetHeight;
        const availableH = vh - (i === 0 ? 0 : headerH + 140); // 140 for top/bottom padding buffer
        
        if (contentH > availableH) {
          const ratio = availableH / contentH;
          container.style.transform = `scale(${ratio})`; // Removed 0.98 to maximize size
        }
      });
    };
    
    applyScaling();
    window.addEventListener('resize', applyScaling);

    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow             = 'hidden';
    document.body.style.height               = '100vh';

    // Mark body so CSS can target 3D-active state
    document.body.classList.add('s3d-active');

    buildUI();
    bindEvents();
    ready = true;

    // Show first section immediately (no animation)
    showFirst();
  }


  function showFirst() {
  sections.forEach((s, i) => {
    const isActive = i === 0;

    s.style.transition = 'none';
    s.style.transform = isActive ? 'none' : FX.fromBottom[0];
    s.style.opacity = isActive ? '1' : '0';
    s.style.visibility = isActive ? 'visible' : 'hidden';
    s.style.pointerEvents = isActive ? 'all' : 'none';
    s.style.zIndex = isActive ? String(sections.length + 2) : String(i + 1);

    s.classList.toggle('s3d-current', isActive);
  });

  cur = 0;
  updateUI();
  triggerReveals(sections[0]);
}

  /* ── NAVIGATION ─────────────────────────────────────────────── */
  function canGo() {
    if (busy) return false;
    const now = Date.now();
    if (now - lastNav < COOL) return false;
    lastNav = now;
    return true;
  }

  function goTo(next) {
    if (next < 0 || next >= sections.length) return;
    if (next === cur) return;

    const prev    = cur;
    const fwd     = next > prev;
    const inSec   = sections[next];
    const outSec  = sections[prev];

    const inPreset  = PRESETS[next]  || PRESETS[next  % PRESETS.length];
    const outPreset = PRESETS[prev]  || PRESETS[prev  % PRESETS.length];

    const inKey  = fwd ? inPreset.in   : outPreset.in;   // going back: reverse
    const outKey = fwd ? outPreset.out  : inPreset.out;

    // Swap: going backward — use opposite directions
    const enterFX = FX[fwd ? inKey  : reverseOut(outPreset.out)]  || FX.fromBottom;
    const leaveFX = FX[fwd ? outKey : reverseIn(inPreset.in)]     || FX.toTop;

    busy = true;

    const ease   = 'cubic-bezier(0.77,0,0.175,1)';
    const trans  = `transform ${DUR}ms ${ease}, opacity ${DUR}ms ${ease}`;

    // 1. Place incoming section at start, invisible, no transition
    inSec.style.transition    = 'none';
    inSec.style.transform     = enterFX[0];
    inSec.style.opacity       = '0';
    inSec.style.zIndex        = String(sections.length + 2);

    // 2. Reset outgoing transition
    outSec.style.transition   = 'none';
    outSec.style.zIndex       = String(sections.length + 1);

    // 3. Force reflow
    inSec.getBoundingClientRect();

    // 4. Enable transitions on both
    inSec.style.transition  = trans;
    outSec.style.transition = trans;

    // 5. Animate in next frame
    requestAnimationFrame(() => {
  requestAnimationFrame(() => {
    inSec.style.visibility = 'visible';
    inSec.style.transform = enterFX[1];
    inSec.style.opacity = '1';
    inSec.style.pointerEvents = 'all';
    inSec.classList.add('s3d-current');

    outSec.style.transform = leaveFX[1];
    outSec.style.opacity = '0';
    outSec.style.pointerEvents = 'none';
    outSec.classList.remove('s3d-current');
  });
});

    // 6. Cleanup
    setTimeout(() => {
  outSec.style.visibility = 'hidden';
  outSec.style.zIndex = String(prev + 1);

  sections.forEach((s, i) => {
    const isActive = i === next;

    s.style.opacity = isActive ? '1' : '0';
    s.style.visibility = isActive ? 'visible' : 'hidden';
    s.style.pointerEvents = isActive ? 'all' : 'none';
    s.style.zIndex = isActive ? String(sections.length + 2) : String(i + 1);

    s.classList.toggle('s3d-current', isActive);
  });

  cur = next;
  busy = false;
  updateUI();
  triggerReveals(inSec);
}, DUR + 60);
  }

  // Reverse helpers for backward navigation
  function reverseOut(key) {
    const map = { toTop:'fromTop', toLeft:'fromLeft', toRight:'fromRight',
                  toTop3d:'fromTop3d', zoomOut:'zoomIn', flipOut:'flipIn' };
    return map[key] || 'fromTop';
  }
  function reverseIn(key) {
    const map = { fromBottom:'toBottom', fromRight:'toRight', fromLeft:'toLeft',
                  fromBtm3d:'toBottom', zoomIn:'zoomOut', flipIn:'flipOut' };
    return map[key] || 'toBottom';
  }

  /* ── REVEAL ELEMENTS IN ACTIVE SECTION ──────────────────────── */
  function triggerReveals(sec) {
    sec.querySelectorAll('.reveal').forEach((el, i) => {
      // Only trigger if not already active to avoid 'jump' or 'return' animation
      if (!el.classList.contains('active')) {
        setTimeout(() => el.classList.add('active'), 100 + i * 80);
      }
    });
  }

  /* ── EVENTS ─────────────────────────────────────────────────── */
  function bindEvents() {
    // ── Wheel (with debounce to handle trackpads) ──
    let wheelAcc = 0, wheelTmr = null;
    window.addEventListener('wheel', e => {
      e.preventDefault();
      wheelAcc += e.deltaY;
      clearTimeout(wheelTmr);
      wheelTmr = setTimeout(() => {
        const d = wheelAcc;
        wheelAcc = 0;
        if (Math.abs(d) < 40) return; 
        if (!canGo()) return;
        if (d > 0) goTo(cur + 1); else goTo(cur - 1);
      }, 60);
    }, { passive: false });

    // ── Touch ──
    window.addEventListener('touchstart', e => { touchY = e.changedTouches[0].clientY; }, { passive: true });
    window.addEventListener('touchend', e => {
      const delta = touchY - e.changedTouches[0].clientY;
      if (Math.abs(delta) < 50) return;
      if (!canGo()) return;
      if (delta > 0) goTo(cur + 1); else goTo(cur - 1);
    }, { passive: true });

    // ── Keyboard ──
    window.addEventListener('keydown', e => {
      if (e.key === 'ArrowDown' || e.key === 'PageDown') { e.preventDefault(); if (canGo()) goTo(cur + 1); }
      if (e.key === 'ArrowUp'   || e.key === 'PageUp'  ) { e.preventDefault(); if (canGo()) goTo(cur - 1); }
    });

    // ── Nav hash links ──
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', e => {
        const id  = a.getAttribute('href').slice(1);
        const idx = sections.findIndex(s => s.id === id);
        if (idx !== -1) { e.preventDefault(); if (canGo()) goTo(idx); }
      });
    });
  }

  /* ── UI ─────────────────────────────────────────────────────── */
  function buildUI() {
    // Progress bar
    const bar = document.createElement('div');
    bar.id = 's3d-progress-bar';
    document.body.appendChild(bar);

    // Dot navigation
    const ui = document.createElement('div');
    ui.id = 'scroll3d-ui';
    ui.setAttribute('aria-hidden', 'true');

    const dots = document.createElement('div');
    dots.id = 's3d-dots';
    sections.forEach((sec, i) => {
      const d = document.createElement('button');
      d.className = 's3d-dot';
      const h = sec.querySelector('h1,h2');
      d.title = h ? h.textContent.trim().slice(0, 26) : `Section ${i + 1}`;
      d.addEventListener('click', () => { if (canGo()) goTo(i); });
      dots.appendChild(d);
    });

    const label = document.createElement('div');
    label.id = 's3d-label';

    ui.appendChild(dots);
    ui.appendChild(label);
    document.body.appendChild(ui);

    // Arrow buttons
    const arrows = document.createElement('div');
    arrows.id = 's3d-arrows';
    arrows.setAttribute('aria-hidden', 'true');
    arrows.innerHTML = `
      <button id="s3d-prev" aria-label="Previous section"><i class="fas fa-chevron-up"></i></button>
      <button id="s3d-next" aria-label="Next section"><i class="fas fa-chevron-down"></i></button>
    `;
    document.body.appendChild(arrows);

    document.getElementById('s3d-prev').addEventListener('click', () => { if (canGo()) goTo(cur - 1); });
    document.getElementById('s3d-next').addEventListener('click', () => { if (canGo()) goTo(cur + 1); });

    // Scroll hint
    const hint = document.createElement('div');
    hint.id = 's3d-scroll-hint';
    hint.innerHTML = `<span>Scroll to explore</span><div class="hint-arrow"></div>`;
    document.body.appendChild(hint);
    const hideHint = () => { hint.style.cssText += 'opacity:0;transition:opacity 0.5s;'; setTimeout(() => hint.remove(), 600); };
    window.addEventListener('wheel',    hideHint, { once: true });
    window.addEventListener('touchend', hideHint, { once: true });
    window.addEventListener('keydown',  hideHint, { once: true });
  }

  function updateUI() {
    document.querySelectorAll('.s3d-dot').forEach((d, i) => d.classList.toggle('active', i === cur));
    const lbl = document.getElementById('s3d-label');
    if (lbl) {
      const h = sections[cur]?.querySelector('h1,h2');
      lbl.textContent = h ? h.textContent.trim().slice(0, 28) : '';
    }
    const pEl = document.getElementById('s3d-prev');
    const nEl = document.getElementById('s3d-next');
    if (pEl) pEl.style.opacity = cur === 0 ? '0.3' : '1';
    if (nEl) nEl.style.opacity = cur === sections.length - 1 ? '0.3' : '1';
    const bar = document.getElementById('s3d-progress-bar');
    if (bar) bar.style.width = (sections.length > 1 ? cur / (sections.length - 1) * 100 : 100) + '%';
  }

  /* ── BOOT ───────────────────────────────────────────────────── */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
