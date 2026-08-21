<?php
/**
 * NFC MSK — сворачиваемый SEO-блок (раскрывается по кнопке).
 * Ожидает переменную $nfc_seo_html (готовый HTML). Если пусто — ничего не выводит.
 * Опционально $nfc_seo_title — подпись кнопки.
 *
 * Как заполнить: просто напишите текст в редакторе страницы (WordPress) —
 * он появится здесь в сворачиваемом блоке. Работает на любой странице,
 * куда подключён этот партиал.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_seo_html = isset( $nfc_seo_html ) ? $nfc_seo_html : '';
if ( '' === trim( wp_strip_all_tags( $nfc_seo_html ) ) ) {
	return;
}
$nfc_seo_title = isset( $nfc_seo_title ) ? $nfc_seo_title : 'Подробнее';
?>
<section class="nfc-section nfc-section--tight">
	<div class="nfc-container nfc-container--narrow">
		<div class="nfc-seo" id="nfc-seo">
			<button class="nfc-seo__toggle" aria-expanded="false" aria-controls="nfc-seo-body"><?php echo esc_html( $nfc_seo_title ); ?> <span class="nfc-seo__sign" aria-hidden="true">+</span></button>
			<div class="nfc-seo__body" id="nfc-seo-body"><div class="nfc-prose nfc-prose--seo"><?php echo wp_kses_post( $nfc_seo_html ); ?></div></div>
		</div>
	</div>
</section>
