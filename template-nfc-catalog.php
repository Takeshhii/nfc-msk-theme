<?php
/**
 * Template Name: NFC MSK — Каталог
 *
 * Полный каталог: ВСЕ товары (data-driven из nfc_catalog_items()) + готовые
 * решения. Новый товар добавляется в inc/nfc-catalog.php — появляется сам.
 * Назначьте этот шаблон странице со slug «catalog».
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
?>

<main class="nfc-main" id="nfc-content">

	<!-- ==================== ШАПКА ==================== -->
	<section class="nfc-pagehero">
		<div class="nfc-container">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>Каталог</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Каталог NFC-продукции</span>
			<h1 class="nfc-pagehero__title">NFC-продукция в Москве</h1>
			<p class="nfc-pagehero__sub">Визитки, карты, метки, стикеры, брелоки, браслеты, бейджи, таблички и аксессуары. Изготовление от 10 шт, оптовые цены от 100 шт.</p>
		</div>
	</section>

	<!-- ==================== ВСЕ ТОВАРЫ ==================== -->
	<section class="nfc-section" id="catalog">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Товары</span>
				<h2 class="nfc-section__title">Вся NFC-продукция</h2>
			</header>
			<?php require get_stylesheet_directory() . '/inc/nfc-catalog-grid.php'; ?>

			<!-- Калькулятор — сразу под карточками товаров -->
			<div class="nfc-catalog-calc">
				<header class="nfc-section__head nfc-reveal">
					<span class="nfc-section__eyebrow">Цены</span>
					<h2 class="nfc-section__title">Рассчитать стоимость</h2>
					<p class="nfc-section__sub">Пример на NFC-визитках. Цены по каждому товару — на его странице.</p>
				</header>
				<?php
				$nfc_v          = nfc_item_get( 'product', 'vizitki' );
				$nfc_calc_tiers = ! empty( $nfc_v['tiers'] ) ? $nfc_v['tiers'] : array();
				$nfc_calc_min   = ! empty( $nfc_v['min'] ) ? $nfc_v['min'] : 10;
				require get_stylesheet_directory() . '/inc/nfc-calc-block.php';
				?>
			</div>
		</div>
	</section>

	<!-- ==================== ГОТОВЫЕ РЕШЕНИЯ ==================== -->
	<section class="nfc-section nfc-section--alt" id="resheniya">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Решения</span>
				<h2 class="nfc-section__title">Готовые NFC-сценарии</h2>
				<p class="nfc-section__sub">Отзывы, меню, визитка, Wi-Fi, чаевые, лояльность и доступ — подберём носитель под задачу.</p>
			</header>
			<?php require get_stylesheet_directory() . '/inc/nfc-solutions-grid.php'; ?>
		</div>
	</section>

	<!-- ==================== CTA ==================== -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Не нашли нужное?</h2>
				<p class="nfc-cta__sub">Расскажите задачу — подберём носитель и сценарий, рассчитаем стоимость и тираж.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li>Москва</li>
				</ul>
			</div>
			<div class="nfc-cta__text nfc-reveal" style="text-align:left">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="https://t.me/nfc_msk" target="_blank" rel="noopener">Написать в Telegram</a>
				<p class="nfc-cta__sub" style="margin-top:18px">Telegram <a href="https://t.me/nfc_msk" style="color:var(--gold)" target="_blank" rel="noopener">@nfc_msk</a> — ответим быстро.</p>
			</div>
		</div>
	</section>

	<?php
	$nfc_editor   = trim( get_post_field( 'post_content', get_queried_object_id() ) );
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'catalog' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
