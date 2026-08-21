<?php
/**
 * Шаблон отдельной записи (пост блога).
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

	<section class="nfc-pagehero nfc-pagehero--article">
		<div class="nfc-container nfc-container--narrow">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span aria-hidden="true">/</span><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Блог</a><span aria-hidden="true">/</span><span><?php the_title(); ?></span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Статья · <?php echo esc_html( get_the_date() ); ?></span>
			<h1 class="nfc-pagehero__title"><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-container--read">
			<figure class="nfc-cover nfc-reveal">
				<img src="<?php echo esc_url( nfc_cover_url() ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
			</figure>
			<article class="nfc-prose nfc-prose--wide nfc-reveal"><?php the_content(); ?></article>
			<div class="nfc-prose-foot nfc-reveal">
				<a class="nfc-btn nfc-btn--ghost" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">← Все статьи</a>
				<a class="nfc-btn nfc-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>#nfc-cta">Обсудить проект</a>
			</div>
		</div>
	</section>

	<?php endwhile; ?>

	<!-- ==================== ЧИТАЙТЕ ТАКЖЕ (перелинковка блога) ==================== -->
	<?php
	$nfc_pid  = get_queried_object_id();
	$nfc_cats = wp_get_post_categories( $nfc_pid );
	$nfc_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'post__not_in'        => array( $nfc_pid ),
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => true,
	);
	if ( $nfc_cats ) {
		$nfc_args['category__in'] = $nfc_cats;
	}
	$nfc_rel = new WP_Query( $nfc_args );
	if ( ! $nfc_rel->have_posts() ) {
		unset( $nfc_args['category__in'] );
		$nfc_rel = new WP_Query( $nfc_args ); // добор свежими, если в рубрике мало
	}
	if ( $nfc_rel->have_posts() ) :
		?>
		<section class="nfc-section nfc-section--tight">
			<div class="nfc-container">
				<header class="nfc-section__head nfc-reveal"><span class="nfc-section__eyebrow">Блог</span><h2 class="nfc-section__title">Читайте также</h2></header>
				<div class="nfc-grid nfc-grid--3">
					<?php
					while ( $nfc_rel->have_posts() ) :
						$nfc_rel->the_post();
						$nfc_pc = get_the_category();
						?>
						<a class="nfc-article nfc-reveal" href="<?php the_permalink(); ?>">
							<div class="nfc-article__media nfc-article__media--img"><img src="<?php echo esc_url( nfc_cover_url() ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></div>
							<div class="nfc-article__body">
								<span class="nfc-article__cat"><?php echo $nfc_pc ? esc_html( $nfc_pc[0]->name ) : 'Блог'; ?></span>
								<h3 class="nfc-article__title"><?php the_title(); ?></h3>
								<p class="nfc-article__desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 14 ) ); ?></p>
							</div>
						</a>
					<?php endwhile; ?>
				</div>
				<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Все статьи</a></div>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	endif;
	?>

	<!-- ==================== НАШИ РАБОТЫ ==================== -->
	<section class="nfc-section nfc-section--alt nfc-section--tight">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Наши работы</span>
				<h2 class="nfc-section__title">NFC-проекты для бизнеса</h2>
			</header>
			<?php $nfc_works_limit = 3; require get_stylesheet_directory() . '/inc/nfc-works-grid.php'; ?>
			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="<?php echo esc_url( home_url( '/nashi-raboty/' ) ); ?>">Все работы</a></div>
		</div>
	</section>
</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
