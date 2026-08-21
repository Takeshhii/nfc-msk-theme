<?php
/**
 * Template Name: NFC MSK — Решения
 *
 * Витрина готовых решений (data-driven из nfc_solution_items()).
 * Назначьте странице со slug «resheniya-gotovye».
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>Готовые решения</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Готовые NFC-сценарии</span>
			<h1 class="nfc-pagehero__title">Готовые решения на NFC</h1>
			<p class="nfc-pagehero__sub">Отзывы, электронное меню, визитка, Wi-Fi, чаевые, лояльность и доступ. Подберём носитель и настроим сценарий под вашу задачу.</p>
		</div>
	</section>

	<section class="nfc-section">
		<div class="nfc-container">
			<?php require get_stylesheet_directory() . '/inc/nfc-solutions-grid.php'; ?>
			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="/catalog/">Смотреть каталог</a></div>
		</div>
	</section>

	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Подберём решение под задачу</h2>
				<p class="nfc-cta__sub">Опишите сценарий — предложим носитель, тираж и настройку, назовём цену.</p>
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
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'vse-resheniya' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
