/* ==== NAVBAR : menus déroulants ==== */
const dropdownCloseTimers = new Map();

function openDropdown(dd) {
  clearTimeout(dropdownCloseTimers.get(dd));
  document.querySelectorAll('.nav-dropdown.open').forEach(d => { if (d !== dd) d.classList.remove('open'); });
  dd.classList.add('open');
  positionDropdown(dd);
}
function scheduleCloseDropdown(dd) {
  clearTimeout(dropdownCloseTimers.get(dd));
  dropdownCloseTimers.set(dd, setTimeout(() => dd.classList.remove('open'), 220));
}
function toggleDropdown(e, name) {
  e.stopPropagation();
  const dd = document.getElementById('nav-dropdown-' + name);
  if (!dd) return;
  const wasOpen = dd.classList.contains('open');
  closeDropdowns();
  if (!wasOpen) openDropdown(dd);
}
function positionDropdown(dd) {
  const trigger = dd.querySelector('.nav-dd-trigger');
  const menu = dd.querySelector('.nav-dd-menu');
  if (!trigger || !menu) return;
  menu.style.maxWidth = Math.min(320, window.innerWidth - 16) + 'px';
  const r = trigger.getBoundingClientRect();
  const left = Math.max(8, Math.min(r.left, window.innerWidth - menu.offsetWidth - 8));
  menu.style.left = left + 'px';
}
function closeDropdowns() {
  document.querySelectorAll('.nav-dropdown.open').forEach(d => {
    clearTimeout(dropdownCloseTimers.get(d));
    d.classList.remove('open');
  });
}
document.addEventListener('click', e => {
  if (!e.target.closest('.nav-dropdown')) closeDropdowns();
});
window.addEventListener('resize', closeDropdowns);
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.nav-dropdown').forEach(dd => {
    dd.addEventListener('mouseenter', () => openDropdown(dd));
    dd.addEventListener('mouseleave', () => scheduleCloseDropdown(dd));
  });
});

/* ==== TOAST ==== */
function toast(msg, ok = true) {
  const t = document.getElementById('toast');
  if (!t) return;
  document.getElementById('toast-msg').textContent = msg;
  t.style.background = ok ? 'var(--vert)' : '#c0392b';
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 5000);
}

/* ==== SCROLL TOP BUTTON + REVEAL ON SCROLL ==== */
window.addEventListener('scroll', () => {
  const stb = document.getElementById('stb');
  if (stb) stb.classList.toggle('show', window.scrollY > 400);
});
document.addEventListener('DOMContentLoaded', () => {
  const ro = new IntersectionObserver(entries => entries.forEach(e => {
    if (e.isIntersecting) e.target.classList.add('vis');
  }), { threshold: .08 });
  document.querySelectorAll('.rv').forEach(el => ro.observe(el));
});

/* ==== HERO CAROUSEL (page d'accueil) ==== */
let hcarIdx = 0, hcarTimer = null;
function hcarGo(i) {
  const slides = document.querySelectorAll('#hero-carousel .hcar-slide');
  const dots = document.querySelectorAll('#hero-carousel .hcar-dot');
  if (!slides.length) return;
  hcarIdx = (i + slides.length) % slides.length;
  slides.forEach((s, j) => s.classList.toggle('on', j === hcarIdx));
  dots.forEach((d, j) => d.classList.toggle('on', j === hcarIdx));
}
function hcarNext() { hcarGo(hcarIdx + 1); }
function hcarPrev() { hcarGo(hcarIdx - 1); }
function hcarAuto() { clearInterval(hcarTimer); hcarTimer = setInterval(hcarNext, 5500); }
function initHeroCarousel() {
  const el = document.getElementById('hero-carousel');
  if (!el) return;
  hcarAuto();
  el.addEventListener('mouseenter', () => clearInterval(hcarTimer));
  el.addEventListener('mouseleave', hcarAuto);
}
document.addEventListener('DOMContentLoaded', initHeroCarousel);

/* ==== BANDEAU D'ANNONCES ==== */
document.addEventListener('DOMContentLoaded', () => {
  const bar = document.getElementById('announcement-bar');
  if (!bar) return;
  const items = Array.from(bar.querySelectorAll('.announcement-item'));
  const position = bar.querySelector('.announcement-position b');
  const progress = bar.querySelector('.announcement-progress');
  if (items.length < 2) return;

  let index = 0;
  const restartProgress = () => {
    if (!progress) return;
    progress.classList.remove('running');
    void progress.offsetWidth;
    progress.classList.add('running');
  };
  const showNext = () => {
    items[index].classList.remove('active');
    index = (index + 1) % items.length;
    items[index].classList.add('active');
    if (position) position.textContent = String(index + 1);
    restartProgress();
  };
  restartProgress();
  let timer = window.setInterval(showNext, 7000);
  bar.addEventListener('mouseenter', () => {
    window.clearInterval(timer);
    progress?.classList.remove('running');
  });
  bar.addEventListener('mouseleave', () => {
    restartProgress();
    timer = window.setInterval(showNext, 7000);
  });
});

/* ==== ALBUM DES MEMBRES (page d'accueil) ==== */
function initMembersAlbum() {
  const album = document.getElementById('members-album');
  if (!album) return;
  const photos = Array.from(album.querySelectorAll('.members-album-photo'));
  const memberName = album.querySelector('.members-album-count');
  if (photos.length < 2) return;

  let index = 0;
  const render = () => {
    const previous = (index - 1 + photos.length) % photos.length;
    const next = (index + 1) % photos.length;
    photos.forEach((photo, photoIndex) => {
      photo.classList.toggle('previous', photoIndex === previous);
      photo.classList.toggle('current', photoIndex === index);
      photo.classList.toggle('next', photoIndex === next);
    });
    if (memberName) memberName.textContent = photos[index].dataset.memberName || photos[index].alt;
  };
  const turnPage = () => {
    index = (index + 1) % photos.length;
    render();
  };

  render();
  let timer = window.setInterval(turnPage, 3200);
  album.addEventListener('mouseenter', () => window.clearInterval(timer));
  album.addEventListener('mouseleave', () => { timer = window.setInterval(turnPage, 3200); });
}
document.addEventListener('DOMContentLoaded', initMembersAlbum);

/* ==== UPLOAD ZONE (formulaires de saisine / candidature) ==== */
function dragOver(e, zoneId) { e.preventDefault(); document.getElementById(zoneId).classList.add('drag'); }
function dragLeave(e, zoneId) { document.getElementById(zoneId).classList.remove('drag'); }
function dropFiles(e, zoneId, inputId) {
  e.preventDefault();
  document.getElementById(zoneId).classList.remove('drag');
  const input = document.getElementById(inputId);
  input.files = e.dataTransfer.files;
  renderFileList(inputId, inputId + '-list');
}
function renderFileList(inputId, listId) {
  const input = document.getElementById(inputId);
  const list = document.getElementById(listId);
  if (!input || !list) return;
  const files = Array.from(input.files || []);
  list.innerHTML = files.map(f => `
    <div class="file-item">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,.5)" stroke-width="2" stroke-linecap="round"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
      <span class="file-item-name">${f.name}</span>
      <span style="font-size:11px;color:rgba(255,255,255,.3)">${(f.size / 1024).toFixed(0)} Ko</span>
    </div>`).join('');
}

/* ==== ASSISTANT CNEF ==== */
document.addEventListener('DOMContentLoaded', () => {
  const root = document.getElementById('cnef-chat');
  if (!root) return;
  const panel = document.getElementById('chat-panel'), launcher = document.getElementById('chat-launcher');
  const form = document.getElementById('chat-form'), input = document.getElementById('chat-input');
  const messages = document.getElementById('chat-messages'), submit = form.querySelector('button[type="submit"]');
  const setOpen = open => { root.classList.toggle('open', open); launcher.setAttribute('aria-expanded', String(open)); panel.setAttribute('aria-hidden', String(!open)); if (open) setTimeout(() => input.focus(), 220); };
  launcher.addEventListener('click', () => setOpen(!root.classList.contains('open')));
  root.querySelector('.chat-close').addEventListener('click', () => setOpen(false));
  document.addEventListener('keydown', e => { if (e.key === 'Escape') setOpen(false); });
  const bubble = (text, type) => { const el = document.createElement('div'); el.className = `chat-bubble ${type}`; el.textContent = text; messages.appendChild(el); messages.scrollTop = messages.scrollHeight; return el; };
  const ask = async question => {
    const value = question.trim(); if (!value || submit.disabled) return;
    root.querySelector('.chat-suggestions')?.remove(); bubble(value, 'user'); input.value = ''; submit.disabled = true;
    const waiting = bubble('Je recherche l’information…', 'bot loading');
    try {
      const response = await fetch(root.dataset.endpoint, {method:'POST',headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content},body:JSON.stringify({message:value})});
      if (!response.ok) throw new Error('Request failed');
      const data = await response.json(); waiting.remove(); bubble(data.answer, 'bot');
      if (data.action?.url) { const link = document.createElement('a'); link.className = 'chat-action'; link.href = data.action.url; link.textContent = `${data.action.label} →`; messages.appendChild(link); }
    } catch (_) { waiting.textContent = 'Le service est momentanément indisponible. Contactez le CNEF au +241 11 72 20 00 ou à contact@cnef.ga.'; waiting.classList.remove('loading'); }
    finally { submit.disabled = false; input.focus(); messages.scrollTop = messages.scrollHeight; }
  };
  form.addEventListener('submit', e => { e.preventDefault(); ask(input.value); });
  root.querySelectorAll('.chat-suggestions button').forEach(button => button.addEventListener('click', () => ask(button.textContent)));
});

/* Galerie photos de la médiation */
document.addEventListener('DOMContentLoaded', () => {
  const gallery = document.querySelector('.med-gallery');
  if (!gallery) return;
  const slides = Array.from(gallery.querySelectorAll('.med-gallery-slide'));
  const dots = Array.from(gallery.querySelectorAll('.med-gallery-dot'));
  const pauseButton = gallery.querySelector('.med-gallery-pause');
  const liveRegion = gallery.querySelector('.med-gallery-slides');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  let activeIndex = 0;
  let paused = reducedMotion.matches;
  let timer;
  let touchStartX = null;
  const show = (index) => {
    activeIndex = (index + slides.length) % slides.length;
    slides.forEach((slide, position) => {
      const active = position === activeIndex;
      slide.classList.toggle('is-active', active);
      slide.setAttribute('aria-hidden', String(!active));
      dots[position].classList.toggle('is-active', active);
      dots[position].setAttribute('aria-current', String(active));
    });
  };
  const syncPlayback = () => {
    window.clearInterval(timer);
    const stopped = paused || document.hidden || gallery.matches(':hover') || gallery.contains(document.activeElement);
    liveRegion.setAttribute('aria-live', stopped ? 'polite' : 'off');
    pauseButton.textContent = paused ? 'Lecture' : 'Pause';
    pauseButton.setAttribute('aria-label', paused ? 'Reprendre le défilement' : 'Mettre le défilement en pause');
    if (!stopped && slides.length > 1) timer = window.setInterval(() => show(activeIndex + 1), 5500);
  };
  const navigate = (index) => { show(index); syncPlayback(); };
  gallery.querySelector('.med-gallery-prev').addEventListener('click', () => navigate(activeIndex - 1));
  gallery.querySelector('.med-gallery-next').addEventListener('click', () => navigate(activeIndex + 1));
  dots.forEach((dot, index) => dot.addEventListener('click', () => navigate(index)));
  pauseButton.addEventListener('click', () => { paused = !paused; syncPlayback(); });
  gallery.addEventListener('keydown', (event) => {
    if (!['ArrowLeft', 'ArrowRight'].includes(event.key)) return;
    event.preventDefault();
    navigate(activeIndex + (event.key === 'ArrowRight' ? 1 : -1));
  });
  gallery.addEventListener('mouseenter', syncPlayback);
  gallery.addEventListener('mouseleave', syncPlayback);
  gallery.addEventListener('focusin', syncPlayback);
  gallery.addEventListener('focusout', () => window.setTimeout(syncPlayback, 0));
  document.addEventListener('visibilitychange', syncPlayback);
  reducedMotion.addEventListener('change', () => { paused = reducedMotion.matches; syncPlayback(); });
  gallery.addEventListener('touchstart', (event) => { touchStartX = event.touches[0].clientX; }, {passive: true});
  gallery.addEventListener('touchend', (event) => {
    if (touchStartX === null) return;
    const distance = event.changedTouches[0].clientX - touchStartX;
    if (Math.abs(distance) > 50) navigate(activeIndex + (distance < 0 ? 1 : -1));
    touchStartX = null;
  }, {passive: true});
  gallery.addEventListener('touchcancel', () => { touchStartX = null; });
  syncPlayback();
});