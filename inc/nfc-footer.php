<?php
/**
 * NFC MSK — футер (обычный HTML, правится руками).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer class="nfc-footer">
	<div class="nfc-container">

		<div class="nfc-footer__top">
			<div class="nfc-footer__brand">
				<a class="nfc-logo nfc-logo--footer" href="/"><?php include get_stylesheet_directory() . '/inc/nfc-logo.php'; ?></a>
				<p class="nfc-footer__tagline">Изготовление и настройка NFC-носителей под бизнес. Производство и брендирование в Москве.</p>
			</div>

			<div class="nfc-footer__cols">
				<div class="nfc-footer__col">
					<h4 class="nfc-footer__title">Каталог</h4>
					<ul class="nfc-footer__list">
						<li><a href="/vizitki/">NFC визитки</a></li>
						<li><a href="/karty/">NFC карты</a></li>
						<li><a href="/stikery/">Стикеры и наклейки</a></li>
						<li><a href="/breloki/">NFC брелоки</a></li>
						<li><a href="/catalog/">Все товары</a></li>
					</ul>
				</div>

				<div class="nfc-footer__col">
					<h4 class="nfc-footer__title">Готовые решения</h4>
					<ul class="nfc-footer__list">
						<li><a href="/resheniya-gotovye-otzyvy/">NFC для отзывов</a></li>
						<li><a href="/resheniya-gotovye-menu/">Электронное меню</a></li>
						<li><a href="/resheniya-gotovye-wi-fi/">NFC для Wi-Fi</a></li>
						<li><a href="/resheniya-gotovye-loyalnost/">Карты лояльности</a></li>
						<li><a href="/vse-resheniya/">Все решения</a></li>
					</ul>
				</div>

				<div class="nfc-footer__col">
					<h4 class="nfc-footer__title">Навигация</h4>
					<ul class="nfc-footer__list">
						<li><a href="/">Главная</a></li>
						<li><a href="/nashi-raboty/">Наши работы</a></li>
						<li><a href="/nashi_otzyvy/">Клиенты</a></li>
						<li><a href="/dostavka-i-oplata/">Доставка и оплата</a></li>
						<li><a href="/blog/">Блог</a></li>
						<li><a href="/o-kompanii/">О компании</a></li>
						<li><a href="/pomoshch/">Помощь</a></li>
						<li><a href="/kontakty/">Контакты</a></li>
					</ul>
				</div>

				<div class="nfc-footer__col">
					<h4 class="nfc-footer__title">Контакты</h4>
					<ul class="nfc-footer__list nfc-footer__contacts">
						<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
						<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
						<li>Москва</li>
						<li><a class="nfc-tglink" href="https://t.me/nfc_msk" target="_blank" rel="noopener"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-telegram"></use></svg> Telegram @nfc_msk</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="nfc-footer__bottom">
			<p class="nfc-footer__copy">© <?php echo esc_html( gmdate( 'Y' ) ); ?> NFC MSK — изготовление NFC в Москве. Все права защищены.<?php $nfc_upd = function_exists( 'nfc_updated_date' ) ? nfc_updated_date() : ''; ?><?php if ( $nfc_upd ) : ?> <span class="nfc-footer__updated">Обновлено: <?php echo esc_html( $nfc_upd ); ?></span><?php endif; ?></p>
			<div class="nfc-footer__legal">
				<a href="/politika-konfidentsialnosti/">Политика конфиденциальности</a>
				<a href="/karta-sajta/">Карта сайта</a>
					<a class="nfc-footer__uplink" href="tel:+79628800715">+7 (962) 880-07-15</a>
			</div>
		</div>
	</div>
</footer>
