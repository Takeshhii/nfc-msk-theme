<?php
/**
 * Template Name: NFC MSK — Отзывы
 *
 * Страница «Нам доверяют»: логотипы клиентов + сферы бизнеса.
 * Отзывы (слайдер/сетка) и фейковые счётчики убраны — компания молодая,
 * реальных подтверждаемых отзывов пока нет. Соцдоказательство — только логотипы.
 * Назначена странице со slug «otzyvy» (URL /nashi_otzyvy/ не меняем).
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>Нам доверяют</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Клиенты</span>
			<h1 class="nfc-pagehero__title">Нам доверяют</h1>
			<p class="nfc-pagehero__sub">Компании из разных сфер Москвы выбирают NFC-носители NFC MSK — от ресторанов и клиник до магазинов и офисов.</p>
		</div>
	</section>

	<!-- Сферы клиентов -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">
			<div class="nfc-clients nfc-reveal" aria-label="Сферы клиентов" style="margin-top:0;border-top:none;padding-top:0">
				<span>Рестораны</span><span>Отели</span><span>Клиники</span><span>Салоны красоты</span><span>Фитнес-клубы</span><span>Автосервисы</span><span>IT-компании</span><span>Магазины</span>
			</div>
		</div>
	</section>

	<!-- Логотипы клиентов -->
	<?php require get_stylesheet_directory() . '/inc/nfc-logos.php'; ?>

	<!-- Отзывы на Яндексе -->
	<?php $nfc_ya_alt = true; require get_stylesheet_directory() . '/inc/nfc-reviews-widget.php'; ?>

	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Хотите так же?</h2>
				<p class="nfc-cta__sub">Подберём NFC-носитель и сценарий под ваш бизнес — рассчитаем стоимость.</p>
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
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'otzyvy' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
