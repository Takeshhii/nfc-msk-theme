<?php
/**
 * NFC MSK — сетка карточек готовых решений (с фото).
 * Фото берётся из «Изображения записи» страницы решения
 * (/resheniya-gotovye-{slug}/). Нет фото — показываем иконку (без 404).
 * Переиспользуется на странице каталога и на витрине решений.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_smap = array(
	'otzyvy' => 'ic-otzyvy', 'menu' => 'ic-menu', 'vizitka' => 'ic-user', 'wi-fi' => 'ic-wifi',
	'chayevye' => 'ic-chaevye', 'loyalnost' => 'ic-loyalnost', 'dostup' => 'ic-dostup', 'drugoe' => 'ic-drugoe',
);
?>
<div class="nfc-grid nfc-grid--4">
	<?php
	foreach ( nfc_solution_items() as $sslug => $sitem ) :
		$sicon = isset( $nfc_smap[ $sslug ] ) ? $nfc_smap[ $sslug ] : 'ic-drugoe';

		// Фото решения: «изображение записи» страницы решения, затем поле image.
		$sphoto = '';
		$spage  = get_page_by_path( 'resheniya-gotovye-' . $sslug, OBJECT, 'page' );
		if ( $spage && has_post_thumbnail( $spage->ID ) ) {
			$sphoto = get_the_post_thumbnail_url( $spage->ID, 'medium_large' );
		} elseif ( ! empty( $sitem['image'] ) ) {
			$sphoto = $sitem['image'];
		}
		?>
		<a class="nfc-card nfc-reveal" href="<?php echo esc_url( nfc_solution_url( $sslug ) ); ?>">
			<div class="nfc-card__media">
				<svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#<?php echo esc_attr( $sicon ); ?>"></use></svg>
				<?php if ( $sphoto ) : ?><img class="nfc-card__photo" src="<?php echo esc_url( $sphoto ); ?>" alt="<?php echo esc_attr( $sitem['title'] ); ?>" loading="lazy" onerror="this.remove()"><?php endif; ?>
			</div>
			<div class="nfc-card__body">
				<h3 class="nfc-card__title"><?php echo esc_html( $sitem['title'] ); ?></h3>
				<p class="nfc-card__desc"><?php echo esc_html( $sitem['subtitle'] ); ?></p>
				<span class="nfc-card__cta">Подробнее <span>→</span></span>
			</div>
		</a>
	<?php endforeach; ?>
</div>
