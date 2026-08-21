<?php
/**
 * Архив рубрики блога — /category/<slug>/.
 * Те же карточки записей, отфильтрованные по выбранной категории.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
?>

<main class="nfc-main" id="nfc-content">

	<section class="nfc-pagehero">
		<div class="nfc-container">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span aria-hidden="true">/</span><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Блог</a><span aria-hidden="true">/</span><span><?php echo esc_html( single_cat_title( '', false ) ); ?></span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Рубрика</span>
			<h1 class="nfc-pagehero__title"><?php echo esc_html( single_cat_title( '', false ) ); ?></h1>
			<?php if ( category_description() ) : ?>
				<p class="nfc-pagehero__sub"><?php echo wp_kses_post( category_description() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">
			<?php require get_stylesheet_directory() . '/inc/nfc-posts.php'; ?>
		</div>
	</section>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
