/**
 * HUDL Consultancy — front-end behaviour.
 * Nav scroll shadow, mobile hamburger menu, smooth in-page scrolling,
 * reveal-on-scroll animations and blog category filtering.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		// Nav scroll effect.
		var navbar = document.getElementById('navbar');
		if (navbar) {
			window.addEventListener('scroll', function () {
				navbar.classList.toggle('scrolled', window.scrollY > 40);
			});
		}

		// Hamburger menu.
		var hamburger = document.getElementById('hamburger');
		var navLinks = document.getElementById('navLinks');
		if (hamburger && navLinks) {
			hamburger.addEventListener('click', function () {
				navLinks.classList.toggle('open');
				hamburger.setAttribute('aria-expanded', navLinks.classList.contains('open'));
			});
			navLinks.querySelectorAll('a').forEach(function (link) {
				link.addEventListener('click', function () {
					navLinks.classList.remove('open');
					hamburger.setAttribute('aria-expanded', 'false');
				});
			});
			window.addEventListener('scroll', function () {
				if (navLinks.classList.contains('open')) {
					navLinks.classList.remove('open');
					hamburger.setAttribute('aria-expanded', 'false');
				}
			});
		}

		// Smooth scroll for in-page anchors.
		document.querySelectorAll('a[href*="#"]').forEach(function (anchor) {
			var href = anchor.getAttribute('href');
			if (!href || href === '#') {
				return;
			}
			var hashIndex = href.indexOf('#');
			var hash = href.slice(hashIndex);
			// Only intercept if the target exists on this page.
			anchor.addEventListener('click', function (e) {
				var target = null;
				try {
					target = document.querySelector(hash);
				} catch (err) {
					return;
				}
				if (target) {
					e.preventDefault();
					target.scrollIntoView({ behavior: 'smooth' });
				}
			});
		});

		// Reveal-on-scroll.
		var reveals = document.querySelectorAll('.reveal');
		if (reveals.length && 'IntersectionObserver' in window) {
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('visible');
						entry.target.classList.remove('hidden');
					}
				});
			}, { threshold: 0.1 });
			reveals.forEach(function (el) {
				el.classList.add('hidden');
				observer.observe(el);
			});
		}

		// Blog category filter (client-side, matches original behaviour).
		var filterButtons = document.querySelectorAll('.filter-btn');
		if (filterButtons.length) {
			var cards = document.querySelectorAll('.blog-grid .blog-card');
			filterButtons.forEach(function (btn) {
				btn.addEventListener('click', function () {
					filterButtons.forEach(function (b) { b.classList.remove('active'); });
					btn.classList.add('active');
					var filter = btn.getAttribute('data-filter');
					cards.forEach(function (card) {
						var show = filter === 'all' || card.classList.contains('cat-' + filter);
						card.style.display = show ? '' : 'none';
					});
				});
			});
		}

		// Push a generate_lead event when the consultation form is submitted.
		var form = document.querySelector('form[name="consultation"]');
		if (form) {
			form.addEventListener('submit', function () {
				window.dataLayer = window.dataLayer || [];
				window.dataLayer.push({ event: 'generate_lead', form_name: 'consultation' });
			});
		}
	});
})();
