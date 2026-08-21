<?php
/**
 * NFC MSK — логотип. Основной вариант — растровый лого-локап
 * /assets/img/logo-nfc-msk.png (эмблема + «NFC MSK», прозрачный фон).
 * Если файла нет — автоматически показывается фирменный inline-SVG (без 404).
 * Подключается в шапке и футере.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_logo_img = get_stylesheet_directory_uri() . '/assets/img/logo-nfc-msk.png';
?>
<img class="nfc-logo__img" src="<?php echo esc_url( $nfc_logo_img ); ?>" alt="NFC MSK — изготовление NFC в Москве" width="200" height="52" decoding="async" onerror="this.style.display='none';var l=this.parentNode.querySelector('.nfc-logo__legacy');if(l){l.hidden=false;}">
<span class="nfc-logo__legacy" hidden>
	<svg class="nfc-logo__mark-svg" viewBox="0 0 70 40" fill="none" aria-hidden="true" focusable="false">
		<path class="nfc-logo__bracket" d="M42 4 H16 a12 12 0 0 0 -12 12 V24 a12 12 0 0 0 12 12 H42" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
		<rect class="nfc-logo__chip" x="13" y="12" width="18" height="16" rx="3"/>
		<path class="nfc-logo__chipline" d="M22 12 V28 M13 20 H31 M17.5 12 V15.5 M26.5 12 V15.5 M17.5 24.5 V28 M26.5 24.5 V28" stroke-width="1.1" stroke-linecap="round"/>
		<path class="nfc-logo__gold" d="M48 13 a12 12 0 0 1 0 14" stroke-width="3" stroke-linecap="round"/>
		<path class="nfc-logo__gold" d="M55 8 a19 19 0 0 1 0 24" stroke-width="3" stroke-linecap="round"/>
	</svg>
	<span class="nfc-logo__word"><span class="nfc-logo__text">NFC</span><span class="nfc-logo__mark">MSK</span></span>
</span>
