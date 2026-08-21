<?php
/**
 * NFC MSK — только бегущая лента логотипов (без секции/заголовка).
 * Переиспользуется на странице «Отзывы» и на главной у блока отзывов.
 * Файлы: /assets/img/logos/logo-1.png … logo-13.png. Плитки белые, поэтому
 * подходят и логотипы с белым фоном, и тёмный текст. Нет файла — плитка
 * УДАЛЯЕТСЯ из ленты (лента просто становится короче, без дыр и 404).
 * Набор рендерится дважды — для бесшовной прокрутки (копия скрыта от screen-reader).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_logo_dir   = get_stylesheet_directory_uri() . '/assets/img/logos/';
$nfc_logo_count = 12;
// Все плитки одного цвета (белые). Если какой-то логотип сам светлый/белый —
// либо перекрасьте сам логотип в тёмный, либо впишите его номер сюда (тёмная плитка).
$nfc_dark_tiles = array();
?>
<div class="nfc-logos nfc-reveal">
	<div class="nfc-logos__track">
		<?php for ( $set = 0; $set < 2; $set++ ) : ?>
			<?php for ( $i = 1; $i <= $nfc_logo_count; $i++ ) : ?>
				<span class="nfc-logo-tile<?php echo in_array( $i, $nfc_dark_tiles, true ) ? ' nfc-logo-tile--dark' : ''; ?>"<?php echo ( 1 === $set ) ? ' aria-hidden="true"' : ''; ?>>
					<img class="nfc-logo-tile__img" src="<?php echo esc_url( $nfc_logo_dir . 'logo-' . $i . '.png' ); ?>" alt="<?php echo ( 0 === $set ) ? esc_attr( 'Логотип клиента ' . $i ) : ''; ?>" loading="lazy" onerror="this.parentNode.remove()">
				</span>
			<?php endfor; ?>
		<?php endfor; ?>
	</div>
</div>
