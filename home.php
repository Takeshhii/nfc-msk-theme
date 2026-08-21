<?php
/**
 * Страница записей блога (Настройки → Чтение → Страница записей = «Блог»).
 * Родной цикл WordPress — корректная пагинация и счётчик страниц.
 * Обложки: изображение записи или общая шаблонная обложка темы.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
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
					<a class="nfc-chip is-active" role="listitem" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Все статьи</a>
					<?php foreach ( $nfc_cats as $nfc_c ) : ?>
						<a class="nfc-chip" role="listitem" href="<?php echo esc_url( get_category_link( $nfc_c ) ); ?>"><?php echo esc_html( $nfc_c->name ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>
				<div class="nfc-grid nfc-grid--3" style="margin-top:38px">
					<?php while ( have_posts() ) : the_post(); ?>
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

				<?php
				the_posts_pagination(
					array(
						'mid_size'           => 2,
						'prev_text'          => '←',
						'next_text'          => '→',
						'screen_reader_text' => ' ',
						'class'              => 'nfc-pagination',
					)
				);
				?>
			<?php else : ?>
				<p class="nfc-section__sub" style="text-align:center;margin-top:30px">Статей пока нет. Добавьте первую: <strong>Записи → Добавить новую</strong>.</p>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
