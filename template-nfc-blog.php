<?php
/**
 * Template Name: NFC MSK — Блог
 *
 * Единственный блог: автоматически показывает ВАШИ реальные «Записи».
 * Демо-карточек нет — выводятся только опубликованные записи из админки.
 * Рубрики-чипы строятся сами из ваших категорий.
 *
 * Как наполнять: Записи → Добавить новую → выбрать рубрику → Опубликовать.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';

$nfc_paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$nfc_q     = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 9,
		'paged'               => $nfc_paged,
		'ignore_sticky_posts' => true,
	)
);
$nfc_cats = get_categories( array( 'hide_empty' => true ) );
?>

<main class="nfc-main" id="nfc-content">

	<section class="nfc-pagehero">
		<div class="nfc-container">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span aria-hidden="true">/</span><span>Блог</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">База знаний</span>
			<h1 class="nfc-pagehero__title">Блог о NFC</h1>
			<p class="nfc-pagehero__sub">Разбираемся в технологии, сравниваем решения и показываем идеи применения для бизнеса.</p>
		</div>
	</section>

	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">

			<?php if ( ! empty( $nfc_cats ) ) : ?>
				<div class="nfc-chips nfc-reveal" role="list">
					<a class="nfc-chip is-active" role="listitem" href="<?php echo esc_url( get_permalink() ); ?>">Все статьи</a>
					<?php foreach ( $nfc_cats as $nfc_c ) : ?>
						<a class="nfc-chip" role="listitem" href="<?php echo esc_url( get_category_link( $nfc_c ) ); ?>"><?php echo esc_html( $nfc_c->name ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( $nfc_q->have_posts() ) : ?>
				<div class="nfc-grid nfc-grid--3" style="margin-top:38px">
					<?php
					while ( $nfc_q->have_posts() ) :
						$nfc_q->the_post();
						?>
						<a class="nfc-article nfc-reveal" href="<?php the_permalink(); ?>">
							<div class="nfc-article__media nfc-article__media--img">
								<img src="<?php echo esc_url( nfc_cover_url() ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
							</div>
							<div class="nfc-article__body">
								<span class="nfc-article__cat">
									<?php
									$nfc_pc = get_the_category();
									echo $nfc_pc ? esc_html( $nfc_pc[0]->name ) . ' · ' : '';
									echo esc_html( get_the_date() );
									?>
								</span>
								<h2 class="nfc-article__title"><?php the_title(); ?></h2>
								<p class="nfc-article__desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
							</div>
						</a>
					<?php endwhile; ?>
				</div>

				<?php if ( $nfc_q->max_num_pages > 1 ) : ?>
					<div class="nfc-section__more">
						<?php
						echo wp_kses_post(
							paginate_links(
								array(
									'total'   => $nfc_q->max_num_pages,
									'current' => $nfc_paged,
									'type'    => 'list',
								)
							)
						);
						?>
					</div>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p class="nfc-section__sub" style="text-align:center;margin-top:30px">Статей пока нет. Добавьте первую: <strong>Записи → Добавить новую</strong>.</p>
			<?php endif; ?>

		</div>
	</section>

	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Остались вопросы по NFC?</h2>
				<p class="nfc-cta__sub">Подскажем, какой носитель и сценарий подойдут вашему бизнесу.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li>Москва</li>
				</ul>
			</div>
			<div class="nfc-cta__text nfc-reveal" style="text-align:left">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="/catalog/">Смотреть каталог</a>
				<p class="nfc-cta__sub" style="margin-top:18px">Изготовление NFC в Москве под ключ.</p>
			</div>
		</div>
	</section>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
