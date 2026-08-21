<?php
/**
 * NFC MSK — секция «Нам доверяют»: заголовок + бесшовная лента логотипов.
 * Сама лента — в inc/nfc-logos-marquee.php (переиспользуется на главной).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="nfc-section nfc-section--tight">
	<div class="nfc-container">
		<header class="nfc-section__head nfc-reveal">
			<span class="nfc-section__eyebrow">Нам доверяют</span>
			<h2 class="nfc-section__title">Компании, которые выбрали NFC MSK</h2>
		</header>
	</div>
	<?php require get_stylesheet_directory() . '/inc/nfc-logos-marquee.php'; ?>
</section>
