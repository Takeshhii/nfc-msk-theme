<?php
/**
 * NFC MSK — сетка карточек каталога (ВСЕ товары из nfc_catalog_items()).
 * Data-driven: добавили товар в nfc-catalog.php — он появился везде.
 * Переиспользуется на главной и на странице каталога.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_items = nfc_catalog_items();
?>
<div class="nfc-grid nfc-grid--4">
	<?php
	foreach ( $nfc_items as $slug => $d ) :
		$min   = nfc_item_min_price( $d );
		$order = isset( $d['min'] ) ? (int) $d['min'] : 0;
		if ( null === $min ) {
			$price = 'Индивидуальный расчёт';
		} else {
			$price = 'от ' . number_format( $min, 0, '', ' ' ) . ' руб/шт · от ' . $order . ' шт';
		}
		$icon = ! empty( $d['icon'] ) ? $d['icon'] : 'ic-drugoe';

		// Фото товара: сначала «изображение записи» страницы товара, затем поле image.
		// Рендерим <img> только если фото реально есть — иначе показываем иконку (без 404).
		$photo = '';
		$ppage = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $ppage && has_post_thumbnail( $ppage->ID ) ) {
			$photo = get_the_post_thumbnail_url( $ppage->ID, 'medium_large' );
		} elseif ( ! empty( $d['image'] ) ) {
			$photo = $d['image'];
		}
		?>
		<a class="nfc-card nfc-reveal" href="<?php echo esc_url( nfc_product_url( $slug ) ); ?>">
			<?php if ( ! empty( $d['badge'] ) ) : ?><span class="nfc-card__badge"><?php echo esc_html( $d['badge'] ); ?></span><?php endif; ?>
			<div class="nfc-card__media">
				<svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#<?php echo esc_attr( $icon ); ?>"></use></svg>
				<?php if ( $photo ) : ?><img class="nfc-card__photo" src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( $d['title'] ); ?>" loading="lazy" onerror="this.remove()"><?php endif; ?>
			</div>
			<div class="nfc-card__body">
				<h3 class="nfc-card__title"><?php echo esc_html( $d['title'] ); ?></h3>
				<p class="nfc-card__desc"><?php echo esc_html( ! empty( $d['subtitle'] ) ? $d['subtitle'] : '' ); ?></p>
				<span class="nfc-card__price"><?php echo esc_html( $price ); ?></span>
				<span class="nfc-card__cta">Подробнее <span>→</span></span>
			</div>
		</a>
	<?php endforeach; ?>
</div>
