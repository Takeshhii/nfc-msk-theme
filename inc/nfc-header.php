<?php
/**
 * NFC MSK — header с mega-menu (обычный HTML, правится руками).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<header class="nfc-header" id="nfc-header">
	<div class="nfc-container nfc-header__inner">

		<a class="nfc-logo" href="/" aria-label="NFC MSK — на главную"><?php include get_stylesheet_directory() . '/inc/nfc-logo.php'; ?></a>

		<!-- ===== Desktop mega-menu ===== -->
		<nav class="nfc-nav" aria-label="Основное меню">
			<ul class="nfc-nav__list">

				<li class="nfc-nav__item has-mega">
					<a class="nfc-nav__link" href="/catalog/">Каталог <span class="nfc-nav__caret" aria-hidden="true">▾</span></a>
					<div class="nfc-mega"><div class="nfc-mega__grid">
						<a class="nfc-mega__link" href="/vizitki/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-vizitki"></use></svg><span class="nfc-mega__label">NFC визитки</span></a>
						<a class="nfc-mega__link" href="/karty/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-karty"></use></svg><span class="nfc-mega__label">NFC карты</span></a>
						<a class="nfc-mega__link" href="/stikery/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-stikery"></use></svg><span class="nfc-mega__label">Стикеры и наклейки</span></a>
						<a class="nfc-mega__link" href="/breloki/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-breloki"></use></svg><span class="nfc-mega__label">NFC брелоки</span></a>
						<a class="nfc-mega__link" href="/tablichki/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-tablichki"></use></svg><span class="nfc-mega__label">NFC таблички</span></a>
							<a class="nfc-mega__link" href="/braslety/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-braslety"></use></svg><span class="nfc-mega__label">NFC браслеты</span></a>
							<a class="nfc-mega__link" href="/bejdzhi/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-bejdzhi"></use></svg><span class="nfc-mega__label">NFC бейджи</span></a>
							<a class="nfc-mega__link" href="/pamyatniki/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-pamyatniki"></use></svg><span class="nfc-mega__label">Таблички для памятников</span></a>
						</div><a class="nfc-mega__all" href="/catalog/">Весь каталог →</a></div>
				</li>

				<li class="nfc-nav__item has-mega">
					<a class="nfc-nav__link" href="/vse-resheniya/">Решения <span class="nfc-nav__caret" aria-hidden="true">▾</span></a>
					<div class="nfc-mega"><div class="nfc-mega__grid">
						<a class="nfc-mega__link" href="/resheniya-gotovye-otzyvy/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-otzyvy"></use></svg><span class="nfc-mega__label">NFC для отзывов</span></a>
						<a class="nfc-mega__link" href="/resheniya-gotovye-menu/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-menu"></use></svg><span class="nfc-mega__label">Электронное меню</span></a>
						<a class="nfc-mega__link" href="/resheniya-gotovye-vizitka/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-user"></use></svg><span class="nfc-mega__label">NFC визитка</span></a>
						<a class="nfc-mega__link" href="/resheniya-gotovye-wi-fi/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-wifi"></use></svg><span class="nfc-mega__label">NFC для Wi-Fi</span></a>
						<a class="nfc-mega__link" href="/resheniya-gotovye-loyalnost/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-loyalnost"></use></svg><span class="nfc-mega__label">Карты лояльности</span></a>
						<a class="nfc-mega__link" href="/resheniya-gotovye-dostup/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-dostup"></use></svg><span class="nfc-mega__label">Пропуска и доступ</span></a>
							<a class="nfc-mega__link" href="/resheniya-gotovye-pamyat/"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-pamyatniki"></use></svg><span class="nfc-mega__label">NFC для памятников</span></a>
					</div><a class="nfc-mega__all" href="/vse-resheniya/">Все решения →</a></div>
				</li>

				<li class="nfc-nav__item"><a class="nfc-nav__link" href="/nashi-raboty/">Наши работы</a></li>
				<li class="nfc-nav__item"><a class="nfc-nav__link" href="/nashi_otzyvy/">Клиенты</a></li>
				<li class="nfc-nav__item"><a class="nfc-nav__link" href="/blog/">Блог</a></li>
				<li class="nfc-nav__item"><a class="nfc-nav__link" href="/o-kompanii/">О компании</a></li>
				<li class="nfc-nav__item"><a class="nfc-nav__link" href="/kontakty/">Контакты</a></li>
			</ul>
		</nav>

		<div class="nfc-header__actions">
			<a class="nfc-header__tg" href="https://t.me/nfc_msk" target="_blank" rel="noopener" aria-label="Написать в Telegram"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-telegram"></use></svg></a>
			<a class="nfc-header__phone" href="tel:+79628800715">+7 (962) 880-07-15</a>
			<a class="nfc-btn nfc-btn--primary nfc-btn--sm" href="#nfc-cta">Заявка</a>
			<button class="nfc-burger" id="nfc-burger" aria-label="Меню" aria-expanded="false" aria-controls="nfc-mobile"><span></span><span></span><span></span></button>
		</div>
	</div>
</header>

<!-- ===== Mobile menu (вне header: fixed относительно окна) ===== -->
<div class="nfc-mobile" id="nfc-mobile" hidden>
		<nav class="nfc-mobile__nav" aria-label="Мобильное меню">
			<ul class="nfc-mobile__list">
				<li class="nfc-mobile__item">
					<button class="nfc-mobile__toggle" aria-expanded="false" aria-controls="nfc-msub-1">Каталог<span class="nfc-mobile__caret" aria-hidden="true">+</span></button>
					<div class="nfc-mobile__sub" id="nfc-msub-1" hidden>
						<a class="nfc-mobile__sublink nfc-mobile__sublink--all" href="/catalog/">Все товары</a>
						<a class="nfc-mobile__sublink" href="/vizitki/">NFC визитки</a>
						<a class="nfc-mobile__sublink" href="/karty/">NFC карты</a>
						<a class="nfc-mobile__sublink" href="/stikery/">Стикеры и наклейки</a>
						<a class="nfc-mobile__sublink" href="/breloki/">NFC брелоки</a>
						<a class="nfc-mobile__sublink" href="/tablichki/">NFC таблички</a>
							<a class="nfc-mobile__sublink" href="/braslety/">NFC браслеты</a>
							<a class="nfc-mobile__sublink" href="/bejdzhi/">NFC бейджи</a>
							<a class="nfc-mobile__sublink" href="/pamyatniki/">Таблички для памятников</a>
					</div>
				</li>
				<li class="nfc-mobile__item">
					<button class="nfc-mobile__toggle" aria-expanded="false" aria-controls="nfc-msub-3">Решения<span class="nfc-mobile__caret" aria-hidden="true">+</span></button>
					<div class="nfc-mobile__sub" id="nfc-msub-3" hidden>
						<a class="nfc-mobile__sublink nfc-mobile__sublink--all" href="/vse-resheniya/">Все решения</a>
						<a class="nfc-mobile__sublink" href="/resheniya-gotovye-otzyvy/">NFC для отзывов</a>
						<a class="nfc-mobile__sublink" href="/resheniya-gotovye-menu/">Электронное меню</a>
						<a class="nfc-mobile__sublink" href="/resheniya-gotovye-vizitka/">NFC визитка</a>
						<a class="nfc-mobile__sublink" href="/resheniya-gotovye-wi-fi/">NFC для Wi-Fi</a>
						<a class="nfc-mobile__sublink" href="/resheniya-gotovye-loyalnost/">Карты лояльности</a>
						<a class="nfc-mobile__sublink" href="/resheniya-gotovye-dostup/">Пропуска и доступ</a>
							<a class="nfc-mobile__sublink" href="/resheniya-gotovye-pamyat/">NFC для памятников</a>
					</div>
				</li>
				<li class="nfc-mobile__item"><a class="nfc-mobile__toggle" href="/nashi-raboty/">Наши работы</a></li>
				<li class="nfc-mobile__item"><a class="nfc-mobile__toggle" href="/nashi_otzyvy/">Клиенты</a></li>
				<li class="nfc-mobile__item"><a class="nfc-mobile__toggle" href="/blog/">Блог</a></li>
				<li class="nfc-mobile__item"><a class="nfc-mobile__toggle" href="/o-kompanii/">О компании</a></li>
				<li class="nfc-mobile__item"><a class="nfc-mobile__toggle" href="/kontakty/">Контакты</a></li>
			</ul>
			<div class="nfc-mobile__footer">
				<ul class="nfc-mobile__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li><a href="https://t.me/nfc_msk" target="_blank" rel="noopener">Telegram @nfc_msk</a></li>
					<li>Москва</li>
				</ul>
				<a class="nfc-btn nfc-btn--primary nfc-btn--block" href="#nfc-cta">Оставить заявку</a>
			</div>
		</nav>
	</div>
