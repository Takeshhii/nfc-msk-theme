<?php
/**
 * Template Name: NFC MSK — Доставка и оплата
 *
 * Сервисная страница: способы доставки, оплаты, сроки + FAQ.
 * Тексты/цены правьте руками. Назначьте странице со slug «dostavka-i-oplata».
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><a href="/pomoshch/">Помощь</a><span aria-hidden="true">/</span><span>Доставка и оплата</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Помощь</span>
			<h1 class="nfc-pagehero__title">Доставка и оплата</h1>
			<p class="nfc-pagehero__sub">Доставляем NFC-продукцию по Москве и по всей России. Оплата удобным способом — для физлиц и компаний.</p>
		</div>
	</section>

	<!-- Доставка -->
	<section class="nfc-section">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal"><span class="nfc-section__eyebrow">Доставка</span><h2 class="nfc-section__title">Способы доставки</h2></header>
			<div class="nfc-grid nfc-grid--3">
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-avto"></use></svg><h3 class="nfc-feature__title">Курьер по Москве</h3><p class="nfc-feature__desc">Доставка курьером по Москве — 1 300 руб.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-dostup"></use></svg><h3 class="nfc-feature__title">Самовывоз</h3><p class="nfc-feature__desc">Можно забрать заказ самостоятельно в Москве — согласуем время после готовности.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-magazin"></use></svg><h3 class="nfc-feature__title">По России</h3><p class="nfc-feature__desc">Отправляем транспортными компаниями и Почтой России. Стоимость — по тарифам перевозчика.</p></div>
			</div>
		</div>
	</section>

	<!-- Оплата -->
	<section class="nfc-section nfc-section--alt">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal"><span class="nfc-section__eyebrow">Оплата</span><h2 class="nfc-section__title">Способы оплаты</h2></header>
			<div class="nfc-grid nfc-grid--3">
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-loyalnost"></use></svg><h3 class="nfc-feature__title">Картой или переводом</h3><p class="nfc-feature__desc">Оплата банковской картой или переводом по реквизитам — для частных клиентов.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-factory"></use></svg><h3 class="nfc-feature__title">По счёту для юрлиц</h3><p class="nfc-feature__desc">Безналичная оплата по счёту с закрывающими документами для организаций.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-support"></use></svg><h3 class="nfc-feature__title">Физлицам и юрлицам</h3><p class="nfc-feature__desc">Работаем и с частными клиентами, и с организациями — подберём удобный способ оплаты.</p></div>
			</div>
		</div>
	</section>

	<!-- Сроки -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-container--narrow">
			<div class="nfc-prose nfc-reveal">
				<h2>Сроки и предоплата</h2>
				<p>Все заказы запускаем в работу после согласования макета и оплаты. Стандартный срок — до 5 рабочих дней для небольших заказов; по остальной продукции срок зависит от тиража и считается индивидуально (где-то дни, где-то до месяца).</p>
				<p>Для заказов до 150 000 руб действует 100% предоплата. Точные сроки по вашему заказу подтвердим после согласования дизайна и тиража.</p>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="nfc-section nfc-section--alt" id="faq">
		<div class="nfc-container nfc-container--narrow">
			<header class="nfc-section__head nfc-reveal"><span class="nfc-section__eyebrow">FAQ</span><h2 class="nfc-section__title">Частые вопросы</h2></header>
			<?php
			nfc_faq(
				array(
					'Сколько стоит доставка по Москве?'        => '<p>Доставка курьером по Москве — 1 300 руб. По России — по тарифам транспортной компании или Почты России.</p>',
					'Доставляете ли в другие города?'          => '<p>Да, отправляем по всей России транспортными компаниями и Почтой России по тарифам перевозчика.</p>',
					'Можно ли оплатить по счёту от компании?'  => '<p>Да. Работаем с юрлицами по безналичному расчёту и предоставляем закрывающие документы. С частными клиентами — оплата картой или переводом.</p>',
					'Какие сроки изготовления?'                => '<p>Зависит от продукции и тиража — от нескольких дней до месяца, всё индивидуально. Точный срок подтвердим после согласования макета.</p>',
				)
			);
			?>
		</div>
	</section>

	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Остались вопросы?</h2>
				<p class="nfc-cta__sub">Напишите или позвоните — подскажем по доставке, оплате и срокам вашего заказа.</p>
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
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'dostavka-i-oplata' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
