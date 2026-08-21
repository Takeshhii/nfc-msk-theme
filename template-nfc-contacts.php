<?php
/**
 * Template Name: NFC MSK — Контакты
 *
 * Страница контактов: телефон, почта, Telegram, часы работы + форма заявки.
 * Назначьте странице со slug «kontakty» (URL /kontakty/).
 * Реквизиты берутся из functions.php (nfc_phone_*, nfc_email).
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>Контакты</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Контакты</span>
			<h1 class="nfc-pagehero__title">Связаться с NFC MSK</h1>
			<p class="nfc-pagehero__sub">Изготовление и настройка NFC-носителей в Москве. Напишите или позвоните — ответим и рассчитаем заказ.</p>
		</div>
	</section>

	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-container--narrow">
			<div class="nfc-contacts__info nfc-reveal">
				<ul class="nfc-facts">
					<li><span class="nfc-facts__k">Телефон</span><span class="nfc-facts__v"><a href="tel:<?php echo esc_attr( nfc_phone_href() ); ?>"><?php echo esc_html( nfc_phone_display() ); ?></a></span></li>
					<li><span class="nfc-facts__k">Почта</span><span class="nfc-facts__v"><a href="mailto:<?php echo esc_attr( nfc_email() ); ?>"><?php echo esc_html( nfc_email() ); ?></a></span></li>
					<li><span class="nfc-facts__k">Telegram</span><span class="nfc-facts__v"><a href="https://t.me/nfc_msk" target="_blank" rel="noopener">@nfc_msk</a></span></li>
					<li><span class="nfc-facts__k">Часы работы</span><span class="nfc-facts__v">Пн–Пт 10:00–18:00<br>Сб–Вс выходной</span></li>
				</ul>
				<div class="nfc-contacts__actions">
					<a class="nfc-btn nfc-btn--primary" href="tel:<?php echo esc_attr( nfc_phone_href() ); ?>">Позвонить</a>
					<a class="nfc-btn nfc-btn--ghost" href="https://t.me/nfc_msk" target="_blank" rel="noopener">Написать в Telegram</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Отзывы на Яндексе -->
	<?php $nfc_ya_alt = true; require get_stylesheet_directory() . '/inc/nfc-reviews-widget.php'; ?>

	<!-- Форма заявки -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Оставить заявку</h2>
				<p class="nfc-cta__sub">Опишите задачу — подберём носитель, тираж и брендирование, рассчитаем стоимость.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:<?php echo esc_attr( nfc_phone_href() ); ?>"><?php echo esc_html( nfc_phone_display() ); ?></a></li>
					<li><a href="mailto:<?php echo esc_attr( nfc_email() ); ?>"><?php echo esc_html( nfc_email() ); ?></a></li>
					<li>Москва</li>
				</ul>
			</div>
			<form class="nfc-form nfc-reveal" action="https://formspree.io/f/mwvdwqar" method="POST">
				<input type="hidden" name="_subject" value="Заявка с сайта NFC MSK — Контакты">
				<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-name">Имя</label><input class="nfc-form__input" id="nfc-name" name="Имя" type="text" required placeholder="Как к вам обращаться"></div>
				<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-email">Email</label><input class="nfc-form__input" id="nfc-email" name="email" type="email" required placeholder="you@example.com"></div>
				<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-phone">Телефон или Telegram</label><input class="nfc-form__input" id="nfc-phone" name="Телефон" type="text" placeholder="+7 ___ ___-__-__"></div>
				<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-task">Задача</label><textarea class="nfc-form__input" id="nfc-task" name="message" rows="3" placeholder="Например: NFC-визитки с логотипом, 200 шт"></textarea></div>
				<button class="nfc-btn nfc-btn--primary nfc-btn--block nfc-btn--lg" type="submit">Отправить заявку</button>
				<p class="nfc-form__note">Нажимая кнопку, вы соглашаетесь с <a href="/politika-konfidentsialnosti/">политикой конфиденциальности</a>.</p>
			</form>
		</div>
	</section>

	<?php
	$nfc_editor   = trim( get_post_field( 'post_content', get_queried_object_id() ) );
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : '';
	if ( '' !== $nfc_seo_html ) {
		require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	}
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
