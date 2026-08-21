<?php
/**
 * Стандартный шаблон страницы (когда не выбран особый шаблон).
 * Заголовок + текст из редактора в читабельном оформлении.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
?>

<main class="nfc-main" id="nfc-content">
	<?php while ( have_posts() ) : the_post(); ?>

	<section class="nfc-pagehero">
		<div class="nfc-container">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span aria-hidden="true">/</span><span><?php the_title(); ?></span>
			</nav>
			<h1 class="nfc-pagehero__title"><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-container--narrow">
			<article class="nfc-prose nfc-reveal"><?php the_content(); ?></article>
		</div>
	</section>

	<?php endwhile; ?>
</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
