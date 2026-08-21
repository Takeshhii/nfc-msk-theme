<?php
/**
 * Template Name: NFC MSK — Статья
 *
 * Шаблон отдельной статьи блога. Заголовок берётся из названия страницы,
 * ТЕКСТ статьи пишется в обычном редакторе WordPress — он выводится в красивом
 * читабельном «prose»-блоке (крупные шрифты, аккуратные отступы).
 *
 * Применение: создайте Страницу (родитель — «Блог»), шаблон «NFC MSK — Статья»,
 * напишите текст в редакторе. URL будет вида /blog/<slug>/.
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

	<!-- ==================== ШАПКА СТАТЬИ ==================== -->
	<section class="nfc-pagehero nfc-pagehero--article">
		<div class="nfc-container nfc-container--narrow">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="/">Главная</a><span aria-hidden="true">/</span><a href="/blog/">Блог</a><span aria-hidden="true">/</span><span><?php the_title(); ?></span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Статья · <?php echo esc_html( get_the_date() ); ?></span>
			<h1 class="nfc-pagehero__title"><?php the_title(); ?></h1>
		</div>
	</section>

	<!-- ==================== ТЕКСТ СТАТЬИ ==================== -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-container--narrow">
			<article class="nfc-prose nfc-reveal">
				<?php
				the_content();

				// Если текст ещё не добавлен — покажем подсказку (видна только в пустой странице).
				if ( ! get_the_content() ) {
					echo '<p><em>Добавьте текст статьи в редакторе WordPress — он появится здесь в этом оформлении.</em></p>';
				}
				?>
			</article>

			<div class="nfc-prose-foot nfc-reveal">
				<a class="nfc-btn nfc-btn--ghost" href="/blog/">← Все статьи</a>
				<a class="nfc-btn nfc-btn--primary" href="#nfc-cta">Обсудить проект</a>
			</div>
		</div>
	</section>

	<?php endwhile; ?>

	<!-- ==================== НАШИ РАБОТЫ ==================== -->
	<section class="nfc-section nfc-section--alt nfc-section--tight">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Наши работы</span>
				<h2 class="nfc-section__title">NFC-проекты для бизнеса</h2>
			</header>
			<?php $nfc_works_limit = 3; require get_stylesheet_directory() . '/inc/nfc-works-grid.php'; ?>
			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="/nashi-raboty/">Все работы</a></div>
		</div>
	</section>

	<!-- ==================== CTA ==================== -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Внедрим NFC в ваш бизнес</h2>
				<p class="nfc-cta__sub">Подберём носитель и сценарий, изготовим и настроим под ключ.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li>Москва</li>
				</ul>
			</div>
			<div class="nfc-cta__text nfc-reveal" style="text-align:left">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="/catalog/">Смотреть каталог</a>
				<p class="nfc-cta__sub" style="margin-top:18px">Или посмотрите <a href="/catalog/" style="color:var(--gold)">каталог товаров</a>.</p>
			</div>
		</div>
	</section>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
