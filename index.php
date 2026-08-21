<?php
/**
 * Базовый шаблон (фолбэк): архивы, рубрики, поиск, лента записей.
 * Обязателен для валидной темы WordPress.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';

if ( is_search() ) {
	$nfc_title = 'Поиск: ' . get_search_query();
} elseif ( is_category() || is_tag() || is_archive() ) {
	$nfc_title = wp_strip_all_tags( get_the_archive_title() );
} else {
	$nfc_title = 'Блог';
}
?>

<main class="nfc-main" id="nfc-content">

	<section class="nfc-pagehero">
		<div class="nfc-container">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span aria-hidden="true">/</span><span><?php echo esc_html( $nfc_title ); ?></span>
			</nav>
			<h1 class="nfc-pagehero__title"><?php echo esc_html( $nfc_title ); ?></h1>
		</div>
	</section>

	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">
			<?php if ( have_posts() ) : ?>
				<div class="nfc-grid nfc-grid--3">
					<?php while ( have_posts() ) : the_post(); ?>
						<a class="nfc-article nfc-reveal" href="<?php the_permalink(); ?>">
							<div class="nfc-article__media">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium' ); ?>
								<?php else : ?>
									<svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-book"></use></svg>
								<?php endif; ?>
							</div>
							<div class="nfc-article__body">
								<span class="nfc-article__cat"><?php echo esc_html( get_the_date() ); ?></span>
								<h2 class="nfc-article__title"><?php the_title(); ?></h2>
								<p class="nfc-article__desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
							</div>
						</a>
					<?php endwhile; ?>
				</div>
				<div class="nfc-section__more"><?php echo wp_kses_post( paginate_links( array( 'type' => 'list' ) ) ); ?></div>
			<?php else : ?>
				<p class="nfc-section__sub" style="text-align:center">Записей пока нет.</p>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
