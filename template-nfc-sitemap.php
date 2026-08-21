<?php
/**
 * Template Name: NFC MSK — Карта сайта
 *
 * HTML-карта сайта: все товары, решения, разделы и ВСЕ статьи блога.
 * Товары/решения строятся автоматически из nfc-catalog.php, статьи — из WP.
 * Назначьте странице со slug «karta-sajta» (URL /karta-sajta/).
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>Карта сайта</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Навигация</span>
			<h1 class="nfc-pagehero__title">Карта сайта</h1>
			<p class="nfc-pagehero__sub">Все разделы, товары, решения и статьи NFC MSK на одной странице.</p>
		</div>
	</section>

	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">
			<div class="nfc-sitemap">

				<!-- Каталог -->
				<div class="nfc-sitemap__col nfc-reveal">
					<h2 class="nfc-sitemap__title"><a href="/catalog/">Каталог</a></h2>
					<ul class="nfc-sitemap__list">
						<?php foreach ( nfc_catalog_items() as $nfc_s => $nfc_i ) : ?>
							<li><a href="<?php echo esc_url( nfc_product_url( $nfc_s ) ); ?>"><?php echo esc_html( $nfc_i['title'] ); ?></a></li>
						<?php endforeach; ?>
						<li><a href="/catalog/">Весь каталог</a></li>
					</ul>
				</div>

				<!-- Готовые решения -->
				<div class="nfc-sitemap__col nfc-reveal">
					<h2 class="nfc-sitemap__title"><a href="/vse-resheniya/">Готовые решения</a></h2>
					<ul class="nfc-sitemap__list">
						<?php foreach ( nfc_solution_items() as $nfc_s => $nfc_i ) : ?>
							<li><a href="<?php echo esc_url( nfc_solution_url( $nfc_s ) ); ?>"><?php echo esc_html( $nfc_i['title'] ); ?></a></li>
						<?php endforeach; ?>
						<li><a href="/vse-resheniya/">Все решения</a></li>
					</ul>
				</div>

				<!-- Разделы сайта -->
				<div class="nfc-sitemap__col nfc-reveal">
					<h2 class="nfc-sitemap__title">Разделы</h2>
					<ul class="nfc-sitemap__list">
						<li><a href="/">Главная</a></li>
						<li><a href="/nashi-raboty/">Наши работы</a></li>
						<li><a href="/nashi_otzyvy/">Клиенты</a></li>
						<li><a href="/blog/">Блог</a></li>
						<li><a href="/o-kompanii/">О компании</a></li>
						<li><a href="/pomoshch/">Помощь</a></li>
						<li><a href="/dostavka-i-oplata/">Доставка и оплата</a></li>
						<li><a href="/kontakty/">Контакты</a></li>
						<li><a href="/politika-konfidentsialnosti/">Политика конфиденциальности</a></li>
					</ul>
				</div>

				<!-- Рубрики блога -->
				<?php $nfc_cats = get_categories( array( 'hide_empty' => true ) ); ?>
				<?php if ( ! empty( $nfc_cats ) ) : ?>
					<div class="nfc-sitemap__col nfc-reveal">
						<h2 class="nfc-sitemap__title"><a href="/blog/">Рубрики блога</a></h2>
						<ul class="nfc-sitemap__list">
							<?php foreach ( $nfc_cats as $nfc_c ) : ?>
								<li><a href="<?php echo esc_url( get_category_link( $nfc_c ) ); ?>"><?php echo esc_html( $nfc_c->name ); ?> <span class="nfc-sitemap__count">(<?php echo (int) $nfc_c->count; ?>)</span></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

			</div>

			<!-- Все статьи блога -->
			<?php
			$nfc_posts = new WP_Query(
				array(
					'post_type'           => 'post',
					'posts_per_page'      => -1,
					'orderby'             => 'date',
					'order'               => 'DESC',
					'ignore_sticky_posts' => 1,
					'no_found_rows'       => true,
				)
			);
			if ( $nfc_posts->have_posts() ) :
				?>
				<div class="nfc-sitemap__articles nfc-reveal">
					<h2 class="nfc-sitemap__title"><a href="/blog/">Все статьи блога</a> <span class="nfc-sitemap__count">(<?php echo (int) $nfc_posts->post_count; ?>)</span></h2>
					<ul class="nfc-sitemap__list nfc-sitemap__list--articles">
						<?php
						while ( $nfc_posts->have_posts() ) :
							$nfc_posts->the_post();
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
					</ul>
				</div>
				<?php
				wp_reset_postdata();
			endif;
			?>

		</div>
	</section>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
