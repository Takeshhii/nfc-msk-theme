<?php
/**
 * Template Name: NFC MSK — Наши работы
 *
 * Портфолио/кейсы. Data-driven из nfc_works() (inc/nfc-catalog.php).
 * Назначьте этот шаблон странице со slug «nashi-raboty».
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>Наши работы</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Портфолио</span>
			<h1 class="nfc-pagehero__title">Наши работы</h1>
			<p class="nfc-pagehero__sub">Реальные проекты: какие NFC-носители мы изготовили, что настроили и какой результат это дало бизнесу в Москве.</p>
		</div>
	</section>

	<!-- ==================== ФОТО РАБОТ (слайдер) ==================== -->
	<section class="nfc-section">
		<div class="nfc-container">
			<?php require get_stylesheet_directory() . '/inc/nfc-works-slider.php'; ?>
		</div>
	</section>

	<!-- ==================== CTA ==================== -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Хотите так же?</h2>
				<p class="nfc-cta__sub">Расскажите задачу — подберём носитель и сценарий, изготовим и настроим под ваш бренд.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li>Москва</li>
				</ul>
			</div>
			<div class="nfc-cta__text nfc-reveal" style="text-align:left">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="/catalog/">Смотреть каталог</a>
				<p class="nfc-cta__sub" style="margin-top:18px">Или напишите в Telegram <a href="https://t.me/nfc_msk" style="color:var(--gold)" target="_blank" rel="noopener">@nfc_msk</a>.</p>
			</div>
		</div>
	</section>

	<?php
	$nfc_editor   = trim( get_post_field( 'post_content', get_queried_object_id() ) );
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'nashi-raboty' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
