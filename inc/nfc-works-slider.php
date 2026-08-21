<?php
/**
 * NFC MSK — слайдер «Наши работы»: только фотографии, без подписей.
 * Данные — nfc_works(). Если фото нет/не загрузилось — показываем
 * фирменную витрину с иконкой (слайд никогда не пустой).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_works = nfc_works();
?>
<div class="nfc-reviews nfc-workslider nfc-reveal" data-slider>
	<button type="button" class="nfc-slider__arrow nfc-slider__arrow--prev" aria-label="Предыдущее фото">‹</button>
	<div class="nfc-slider__track">
		<?php
		foreach ( $nfc_works as $w ) :
			$icon = ! empty( $w['icon'] ) ? $w['icon'] : 'ic-drugoe';
			?>
			<figure class="nfc-workslide">
				<div class="nfc-workslide__fallback">
					<svg class="nfc-workslide__ico" aria-hidden="true" focusable="false"><use href="#<?php echo esc_attr( $icon ); ?>"></use></svg>
					<span class="nfc-workslide__mark">NFC</span>
				</div>
				<?php if ( ! empty( $w['image'] ) ) : ?>
					<img class="nfc-workslide__img" src="<?php echo esc_url( $w['image'] ); ?>" alt="Наша работа" loading="lazy" onerror="this.style.display='none'">
				<?php endif; ?>
			</figure>
		<?php endforeach; ?>
	</div>
	<button type="button" class="nfc-slider__arrow nfc-slider__arrow--next" aria-label="Следующее фото">›</button>
	<div class="nfc-slider__dots" aria-hidden="true"></div>
</div>
