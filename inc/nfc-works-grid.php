<?php
/**
 * NFC MSK — сетка «Наши работы» (кейсы). Данные — nfc_works().
 * Фото не обязательно: если его нет/не загрузилось — показываем фирменную
 * витрину с иконкой продукта. Переиспользуется на главной и на странице работ.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_works = nfc_works();
if ( isset( $nfc_works_limit ) ) {
	$nfc_works = array_slice( $nfc_works, 0, (int) $nfc_works_limit );
}
?>
<div class="nfc-grid nfc-grid--3">
	<?php
	foreach ( $nfc_works as $w ) :
		$icon  = ! empty( $w['icon'] ) ? $w['icon'] : 'ic-drugoe';
		$place = trim( ( ! empty( $w['client'] ) ? $w['client'] : '' ) . ( ! empty( $w['city'] ) ? ' · ' . $w['city'] : '' ), ' ·' );
		?>
		<article class="nfc-work nfc-reveal">
			<div class="nfc-work__media">
				<span class="nfc-work__fallback">
					<svg class="nfc-work__ico" aria-hidden="true" focusable="false"><use href="#<?php echo esc_attr( $icon ); ?>"></use></svg>
					<span class="nfc-work__mark">NFC</span>
				</span>
				<?php if ( ! empty( $w['image'] ) ) : ?>
					<img class="nfc-work__img" src="<?php echo esc_url( $w['image'] ); ?>" alt="<?php echo esc_attr( $w['title'] ); ?>" loading="lazy" onerror="this.style.display='none'">
				<?php endif; ?>
				<?php if ( $place ) : ?><span class="nfc-work__tag"><?php echo esc_html( $place ); ?></span><?php endif; ?>
			</div>
			<div class="nfc-work__body">
				<h3 class="nfc-work__title"><?php echo esc_html( $w['title'] ); ?></h3>
				<?php if ( ! empty( $w['product'] ) ) : ?><span class="nfc-work__product"><?php echo esc_html( $w['product'] ); ?></span><?php endif; ?>
				<?php if ( ! empty( $w['result'] ) ) : ?><p class="nfc-work__result"><?php echo esc_html( $w['result'] ); ?></p><?php endif; ?>
			</div>
		</article>
	<?php endforeach; ?>
</div>
