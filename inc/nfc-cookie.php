<?php
/**
 * NFC MSK — баннер согласия на использование cookie.
 * Показывается один раз; после «Принять» скрывается (localStorage).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="nfc-cookie" id="nfc-cookie" role="dialog" aria-label="Согласие на использование cookie" hidden>
	<p class="nfc-cookie__text">Мы используем файлы cookie, чтобы сайт работал корректно и удобно. Оставаясь на сайте, вы соглашаетесь с обработкой cookie и <a href="/politika-konfidentsialnosti/">политикой конфиденциальности</a>.</p>
	<div class="nfc-cookie__actions">
		<a class="nfc-cookie__link" href="/politika-konfidentsialnosti/">Подробнее</a>
		<button type="button" class="nfc-btn nfc-btn--primary nfc-btn--sm" id="nfc-cookie-accept">Принять</button>
	</div>
</div>
