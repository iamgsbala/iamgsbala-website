(() => {
  'use strict';

  // Keep conversion links measurable when GA4, Site Kit or another dataLayer consumer is enabled.
  document.addEventListener('click', event => {
    const link = event.target.closest('[data-oc-track]');
    if (!link) return;
    const eventName = link.getAttribute('data-oc-track');
    const placement = link.getAttribute('data-oc-placement') || 'unknown';
    const payload = { event: 'ordercraft_marketing_click', ordercraft_event: eventName, placement };
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(payload);
    if (typeof window.gtag === 'function') {
      window.gtag('event', eventName, { placement, link_url: link.href });
    }
  });

  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('#primary-nav');
  if (!toggle || !nav) return;
  toggle.hidden = false;
  document.documentElement.classList.add('has-js');
  const close = () => { toggle.setAttribute('aria-expanded', 'false'); nav.classList.remove('is-open'); };
  toggle.addEventListener('click', () => {
    const open = toggle.getAttribute('aria-expanded') !== 'true';
    toggle.setAttribute('aria-expanded', String(open));
    nav.classList.toggle('is-open', open);
  });
  nav.querySelectorAll('a').forEach(link => link.addEventListener('click', close));
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') { close(); toggle.focus(); }
  });
  document.addEventListener('click', event => { if (!nav.contains(event.target) && !toggle.contains(event.target)) close(); });
  window.matchMedia('(min-width: 801px)').addEventListener('change', close);
})();
