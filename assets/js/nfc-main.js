/**
 * NFC MSK — интерактив и анимации главной (чистый JS, без библиотек).
 * Sticky-header · мобильное меню · FAQ-аккордеон · появление при скролле · плавный скролл.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		/* ---------- Cookie-согласие ---------- */
		var cookie = document.getElementById('nfc-cookie');
		if (cookie) {
			var seen = false;
			try { seen = localStorage.getItem('nfc_cookie_ok') === '1'; } catch (e) { seen = false; }
			if (!seen) {
				cookie.hidden = false;
				requestAnimationFrame(function () { cookie.classList.add('is-in'); });
			}
			var accept = document.getElementById('nfc-cookie-accept');
			if (accept) {
				accept.addEventListener('click', function () {
					try { localStorage.setItem('nfc_cookie_ok', '1'); } catch (e) {}
					cookie.classList.remove('is-in');
					setTimeout(function () { cookie.hidden = true; }, 350);
				});
			}
		}

		/* ---------- Sticky header ---------- */
		var header = document.getElementById('nfc-header');
		if (header) {
			var onScroll = function () { header.classList.toggle('is-scrolled', window.scrollY > 20); };
			onScroll();
			window.addEventListener('scroll', onScroll, { passive: true });
		}

		/* ---------- Мобильное меню ---------- */
		var burger = document.getElementById('nfc-burger');
		var mobile = document.getElementById('nfc-mobile');
		if (burger && mobile) {
			burger.addEventListener('click', function () {
				var open = mobile.hasAttribute('hidden');
				mobile.toggleAttribute('hidden', !open);
				burger.setAttribute('aria-expanded', String(open));
				burger.classList.toggle('is-open', open);
				document.body.classList.toggle('nfc-no-scroll', open);
			});
		}

		/* ---------- Раскрытие подразделов в мобильном меню ---------- */
		document.querySelectorAll('.nfc-mobile__toggle[aria-controls]').forEach(function (btn) {
			btn.addEventListener('click', function () {
				var panel = document.getElementById(btn.getAttribute('aria-controls'));
				if (!panel) { return; }
				var open = panel.hasAttribute('hidden');
				panel.toggleAttribute('hidden', !open);
				btn.setAttribute('aria-expanded', String(open));
				btn.classList.toggle('is-open', open);
			});
		});

		/* ---------- FAQ аккордеон (плавный, через класс is-open) ---------- */
		document.querySelectorAll('.nfc-faq__q').forEach(function (btn) {
			btn.addEventListener('click', function () {
				var item = btn.closest('.nfc-faq__item');
				if (!item) { return; }
				var open = !item.classList.contains('is-open');
				item.classList.toggle('is-open', open);
				btn.setAttribute('aria-expanded', String(open));
			});
		});

		/* ---------- SEO-блок: раскрытие по кнопке ---------- */
		document.querySelectorAll('.nfc-seo__toggle').forEach(function (btn) {
			btn.addEventListener('click', function () {
				var box = btn.closest('.nfc-seo');
				if (!box) { return; }
				var open = !box.classList.contains('is-open');
				box.classList.toggle('is-open', open);
				btn.setAttribute('aria-expanded', String(open));
			});
		});

		/* ---------- Калькулятор стоимости ---------- */
		document.querySelectorAll('.nfc-calc').forEach(function (calc) {
			var tiers = {};
			try { tiers = JSON.parse(calc.getAttribute('data-tiers') || '{}'); } catch (e) { tiers = {}; }
			var breaks = Object.keys(tiers).map(Number).sort(function (a, b) { return a - b; });
			if (!breaks.length) { return; }

			var MAX = 2000;                                        // выше — индивидуальный расчёт
			var FREE_DELIVERY = 30000;                             // бесплатная доставка от, руб
			var minQty = parseInt(calc.getAttribute('data-min'), 10) || breaks[0];
			var input = calc.querySelector('.nfc-calc__input');
			var presets = calc.querySelectorAll('.nfc-calc__preset');
			var unitEl = calc.querySelector('.nfc-calc__unit');
			var goodsEl = calc.querySelector('.nfc-calc__goods');
			var extraEl = calc.querySelector('.nfc-calc__extra');
			var urgEl = calc.querySelector('.nfc-calc__urg');
			var totalEl = calc.querySelector('.nfc-calc__total');
			var linesEl = calc.querySelector('.nfc-calc__lines');
			var warnEl = calc.querySelector('.nfc-calc__warn');
			var indivEl = calc.querySelector('.nfc-calc__indiv');
			var deliveryEl = calc.querySelector('.nfc-calc__delivery');
			var extraRow = extraEl ? extraEl.closest('.nfc-calc__row') : null;
			var urgRow = urgEl ? urgEl.closest('.nfc-calc__row') : null;
			var design = calc.querySelector('.nfc-opt-design');
			var perunit = calc.querySelectorAll('input[data-perunit]');
			var urgent = calc.querySelector('input[data-urgent]');
			var delivery = calc.querySelector('input[data-delivery]');
			var delivEl = calc.querySelector('.nfc-calc__deliv');
			var delivRow = delivEl ? delivEl.closest('.nfc-calc__row') : null;
			var pvCard = calc.querySelector('.nfc-pv__card');
			if (!input || !unitEl || !totalEl) { return; }

			// Живой конструктор: превью носителя меняется по выбранным опциям
			var updatePreview = function () {
				if (!pvCard) { return; }
				var fx = {};
				perunit.forEach(function (el) { var k = el.getAttribute('data-fx'); if (k) { fx[k] = el.checked; } });
				var dv = design ? (parseFloat(design.value) || 0) : 0;
				var dl = dv >= 3000 ? 2 : dv >= 1500 ? 1 : 0;
				var ptype = pvCard.getAttribute('data-type') || 'vizitki';
				pvCard.className = 'nfc-pv__card pv-type-' + ptype + ' pv-d' + dl
					+ (fx.qr ? ' is-qr' : '') + (fx.foil ? ' is-foil' : '')
					+ (fx.case ? ' is-case' : '') + (fx.link ? ' is-link' : '');
			};

			var fmt = function (n) { return Math.round(n).toLocaleString('ru-RU') + ' руб'; };

			// цена за 1 шт по тиражу: наибольший порог <= q
			var unitPrice = function (q) {
				var p = tiers[breaks[0]];
				for (var i = 0; i < breaks.length; i++) { if (q >= breaks[i]) { p = tiers[breaks[i]]; } }
				return p;
			};
			// ставка за шт: фольгирование по тиражу (>=100 → 10, >=50 → 15, иначе 20), иначе — плоская data-rate
			var addonRate = function (el, q) {
				if (el.getAttribute('data-foil')) { return q >= 100 ? 10 : q >= 50 ? 15 : 20; }
				return parseFloat(el.getAttribute('data-rate')) || 0;
			};

			var setLinesVisible = function (on) { if (linesEl) { linesEl.hidden = !on; } if (deliveryEl) { deliveryEl.hidden = !on; } };

			var update = function () {
				updatePreview();
				var q = Math.max(1, parseInt(input.value, 10) || 1);
				presets.forEach(function (p) { p.classList.toggle('is-active', parseInt(p.getAttribute('data-qty'), 10) === q); });

				// > 2000 → индивидуальный расчёт
				if (q > MAX) {
					if (warnEl) { warnEl.hidden = true; }
					if (indivEl) { indivEl.hidden = false; }
					setLinesVisible(false);
					totalEl.textContent = '';
					return;
				}
				if (indivEl) { indivEl.hidden = true; }

				// ниже минимального заказа → предупреждение
				if (q < minQty) {
					if (warnEl) { warnEl.hidden = false; }
					setLinesVisible(false);
					totalEl.textContent = '';
					return;
				}
				if (warnEl) { warnEl.hidden = true; }
				setLinesVisible(true);

				var u = unitPrice(q);
				var goods = u * q;

				// доп. услуги: макет/дизайн (фикс) + опции за шт
				var extra = design ? (parseFloat(design.value) || 0) : 0;
				perunit.forEach(function (el) { if (el.checked) { extra += addonRate(el, q) * q; } });

				var urg = (urgent && urgent.checked) ? (goods + extra) * 0.30 : 0;
				var deliv = (delivery && delivery.checked) ? (parseFloat(delivery.getAttribute('data-flat')) || 0) : 0;
				var total = goods + extra + urg + deliv;

				unitEl.textContent = fmt(u);
				if (goodsEl) { goodsEl.textContent = fmt(goods); }
				if (extraEl) { extraEl.textContent = fmt(extra); if (extraRow) { extraRow.hidden = extra <= 0; } }
				if (urgEl) { urgEl.textContent = fmt(urg); if (urgRow) { urgRow.hidden = urg <= 0; } }
				if (delivEl) { delivEl.textContent = fmt(deliv); if (delivRow) { delivRow.hidden = deliv <= 0; } }
				totalEl.textContent = fmt(total);
			};

			input.addEventListener('input', update);
			if (design) { design.addEventListener('change', update); }
			perunit.forEach(function (el) { el.addEventListener('change', update); });
			if (urgent) { urgent.addEventListener('change', update); }
			if (delivery) { delivery.addEventListener('change', update); }
			var dec = calc.querySelector('[data-dec]'), inc = calc.querySelector('[data-inc]');
			if (dec) { dec.addEventListener('click', function () { input.value = Math.max(1, (parseInt(input.value, 10) || 1) - 10); update(); }); }
			if (inc) { inc.addEventListener('click', function () { input.value = (parseInt(input.value, 10) || 0) + 10; update(); }); }
			presets.forEach(function (p) { p.addEventListener('click', function () { input.value = p.getAttribute('data-qty'); update(); }); });
			update();
		});

		/* ---------- Слайдер (отзывы и др.) ---------- */
		document.querySelectorAll('[data-slider]').forEach(function (slider) {
			var track = slider.querySelector('.nfc-reviews__track, .nfc-slider__track');
			if (!track || !track.children.length) { return; }
			var slides = track.children;
			var prev = slider.querySelector('.nfc-slider__arrow--prev');
			var next = slider.querySelector('.nfc-slider__arrow--next');
			var dotsWrap = slider.querySelector('.nfc-slider__dots');

			var step = function () {
				var s = slides[0];
				var gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || '20') || 20;
				return s ? s.getBoundingClientRect().width + gap : 300;
			};

			var maxScroll = function () { return track.scrollWidth - track.clientWidth; };
			/* Сколько карточек видно и сколько «страниц» — чтобы точек было немного */
			var perView = function () { var s = step(); return s ? Math.max(1, Math.round(track.clientWidth / s)) : 1; };
			var pageCount = function () { return Math.max(1, Math.ceil(slides.length / perView())); };
			var pageWidth = function () { return perView() * step(); };
			var currentPage = function () {
				var pw = pageWidth();
				var p = pw ? Math.round(track.scrollLeft / pw) : 0;
				return Math.min(pageCount() - 1, Math.max(0, p));
			};

			/* Точки — по одной на страницу, перестраиваются при ресайзе */
			var dots = [];
			var builtFor = -1;
			var buildDots = function () {
				if (!dotsWrap) { return; }
				var n = pageCount();
				if (n === builtFor) { return; }
				builtFor = n;
				dotsWrap.innerHTML = '';
				dots = [];
				for (var i = 0; i < n; i++) {
					(function (idx) {
						var d = document.createElement('button');
						d.type = 'button';
						d.className = 'nfc-slider__dot';
						d.setAttribute('aria-label', 'Группа ' + (idx + 1));
						d.addEventListener('click', function () { track.scrollTo({ left: Math.min(maxScroll(), idx * pageWidth()), behavior: 'smooth' }); });
						dotsWrap.appendChild(d);
						dots.push(d);
					})(i);
				}
			};

			var updateUI = function () {
				var idx = currentPage();
				dots.forEach(function (d, i) { d.classList.toggle('is-active', i === idx); });
			};

			/* Циклический слайдер по «страницам»: с конца — в начало, с начала — в конец */
			var goNext = function () {
				if (track.scrollLeft >= maxScroll() - 2) { track.scrollTo({ left: 0, behavior: 'smooth' }); }
				else { track.scrollBy({ left: pageWidth(), behavior: 'smooth' }); }
			};
			var goPrev = function () {
				if (track.scrollLeft <= 2) { track.scrollTo({ left: maxScroll(), behavior: 'smooth' }); }
				else { track.scrollBy({ left: -pageWidth(), behavior: 'smooth' }); }
			};
			if (next) { next.addEventListener('click', goNext); }
			if (prev) { prev.addEventListener('click', goPrev); }
			track.addEventListener('scroll', function () { requestAnimationFrame(updateUI); }, { passive: true });
			window.addEventListener('resize', function () { buildDots(); updateUI(); });
			buildDots();

			/* Перетаскивание мышью */
			var down = false, startX = 0, startLeft = 0, moved = false;
			track.addEventListener('pointerdown', function (e) { down = true; moved = false; startX = e.clientX; startLeft = track.scrollLeft; });
			window.addEventListener('pointerup', function () { down = false; track.classList.remove('is-drag'); });
			window.addEventListener('pointermove', function (e) {
				if (!down) { return; }
				var dx = e.clientX - startX;
				if (Math.abs(dx) > 4) { moved = true; track.classList.add('is-drag'); }
				if (moved) { track.scrollLeft = startLeft - dx; }
			});

			/* Автопрокрутка (пауза при наведении / взаимодействии), с учётом reduced-motion */
			var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
			var timer = null;
			var play = function () { if (reduce || timer || slides.length < 2) { return; } timer = setInterval(goNext, 4500); };
			var stop = function () { if (timer) { clearInterval(timer); timer = null; } };
			slider.addEventListener('pointerenter', stop);
			slider.addEventListener('pointerleave', play);
			slider.addEventListener('pointerdown', stop);
			document.addEventListener('visibilitychange', function () { if (document.hidden) { stop(); } else { play(); } });
			play();

			updateUI();
		});

		/* ---------- Hero: магнитный 3D-наклон сцены за курсором (только десктоп) ---------- */
		var tapTilt = document.querySelector('.nfc-tapscene__tilt');
		if (tapTilt && window.matchMedia('(hover: hover) and (pointer: fine)').matches &&
			!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			var tiltZone = tapTilt.closest('.nfc-hero__visual') || tapTilt;
			var tiltRaf = null, tiltRy = 0, tiltRx = 0;
			tiltZone.addEventListener('pointermove', function (e) {
				var r = tiltZone.getBoundingClientRect();
				tiltRy = ((e.clientX - r.left) / r.width - 0.5) * 14;   // влево-вправо
				tiltRx = ((e.clientY - r.top) / r.height - 0.5) * -10;  // вверх-вниз
				if (!tiltRaf) {
					tiltRaf = requestAnimationFrame(function () {
						tiltRaf = null;
						tapTilt.style.setProperty('--ry', tiltRy.toFixed(2) + 'deg');
						tapTilt.style.setProperty('--rx', tiltRx.toFixed(2) + 'deg');
					});
				}
			});
			tiltZone.addEventListener('pointerleave', function () {
				tapTilt.style.setProperty('--ry', '0deg');
				tapTilt.style.setProperty('--rx', '0deg');
			});
		}

		/* ---------- Появление при скролле ---------- */
		var reveals = document.querySelectorAll('.nfc-reveal');
		if ('IntersectionObserver' in window && reveals.length) {
			// threshold 0 => срабатывает, как только элемент хоть чуть-чуть в зоне
			// видимости (важно для длинных статей, которые выше экрана).
			var io = new IntersectionObserver(function (entries, obs) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-in');
						obs.unobserve(entry.target);
					}
				});
			}, { threshold: 0, rootMargin: '0px 0px -40px 0px' });
			reveals.forEach(function (el) { io.observe(el); });
			// Подстраховка: всё, что видно при загрузке, показываем сразу.
			requestAnimationFrame(function () {
				reveals.forEach(function (el) {
					var r = el.getBoundingClientRect();
					if (r.top < window.innerHeight && r.bottom > 0) { el.classList.add('is-in'); }
				});
			});
		} else {
			reveals.forEach(function (el) { el.classList.add('is-in'); });
		}

		/* ---------- Плавный скролл по якорям ---------- */
		document.querySelectorAll('a[href^="#"]').forEach(function (link) {
			link.addEventListener('click', function (e) {
				var href = link.getAttribute('href');
				if (href === '#' || href.length < 2) { return; }
				var target = document.querySelector(href);
				if (!target) { return; }
				e.preventDefault();
				target.scrollIntoView({ behavior: 'smooth', block: 'start' });
				if (mobile && !mobile.hasAttribute('hidden')) {
					mobile.setAttribute('hidden', '');
					if (burger) { burger.setAttribute('aria-expanded', 'false'); burger.classList.remove('is-open'); }
					document.body.classList.remove('nfc-no-scroll');
				}
			});
		});
	});
})();
