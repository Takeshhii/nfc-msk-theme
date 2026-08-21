<?php
/**
 * Template Name: NFC MSK — Помощь
 *
 * Сервисная страница: разделы помощи (карточки-ссылки) + FAQ-аккордеон + контакты.
 * Всё — обычный HTML, правьте руками.
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>Помощь</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">Центр поддержки</span>
			<h1 class="nfc-pagehero__title">Помощь</h1>
			<p class="nfc-pagehero__sub">Доставка, оплата, гарантия, инструкции и ответы на частые вопросы о NFC.</p>
		</div>
	</section>

	<!-- ==================== ИНТРО С ИЛЛЮСТРАЦИЕЙ ==================== -->
	<section class="nfc-section">
		<div class="nfc-container nfc-split nfc-split--rev">
			<div class="nfc-split__media nfc-reveal">
				<div class="nfc-bigcard nfc-bigcard--illus">
					<?php require get_stylesheet_directory() . '/inc/nfc-illustration.php'; ?>
					<span class="nfc-bigcard__cap">Отвечаем · Настраиваем · Сопровождаем</span>
				</div>
			</div>
			<div class="nfc-split__text nfc-reveal">
				<span class="nfc-section__eyebrow">Мы рядом</span>
				<h2 class="nfc-section__title" style="text-align:left">Поможем на каждом шаге</h2>
				<p>Подберём носитель и сценарий под задачу, подскажем по тиражу и брендированию, настроим ссылку на метке и поможем, если что-то не работает. Отвечаем в Telegram и по телефону.</p>
				<p>Ниже — разделы с ответами о доставке, оплате, гарантии и инструкциях. Не нашли нужное — напишите нам.</p>
			</div>
		</div>
	</section>

	<!-- ==================== РАЗДЕЛЫ ПОМОЩИ ==================== -->
	<section class="nfc-section nfc-section--alt">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Разделы</span>
				<h2 class="nfc-section__title">Чем помочь?</h2>
			</header>
			<div class="nfc-grid nfc-grid--3">
				<a class="nfc-card nfc-reveal" href="/dostavka-i-oplata/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-avto"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Доставка и оплата</h3><p class="nfc-card__desc">Способы оплаты, сроки и доставка по Москве и России.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="#faq"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-drugoe"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Вопросы и ответы</h3><p class="nfc-card__desc">Частые вопросы о технологии, заказе и настройке — ниже на странице.</p><span class="nfc-card__cta">Смотреть <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/catalog/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-karty"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Каталог</h3><p class="nfc-card__desc">Вся NFC-продукция: визитки, карты, метки, таблички.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/vse-resheniya/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-loyalnost"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Готовые решения</h3><p class="nfc-card__desc">Отзывы, меню, визитка, Wi-Fi, лояльность и доступ.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/nashi_otzyvy/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-otzyvy"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Клиенты</h3><p class="nfc-card__desc">Компании, которые выбрали NFC MSK.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/o-kompanii/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-gem"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">О компании</h3><p class="nfc-card__desc">Кто мы, производство и брендирование NFC.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
			</div>
		</div>
	</section>

	<!-- ==================== FAQ ==================== -->
	<section class="nfc-section nfc-section--alt" id="faq">
		<div class="nfc-container nfc-container--narrow">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">FAQ</span>
				<h2 class="nfc-section__title">Частые вопросы</h2>
			</header>
			<?php
			nfc_faq(
				array(
					'Нужно ли приложение для NFC?'            => '<p>Чтобы считать NFC-продукцию — приложение не нужно: клиент подносит смартфон, и телефон сам открывает нужную страницу. Приложение требуется только для того, чтобы запрограммировать (записать) метку — это делаем мы за вас.</p>',
					'Можно ли изменить ссылку на метке?'      => '<p>Ссылку записываем при изготовлении. Если планируете менять её удалённо в будущем — скажите об этом заранее, тогда заложим такую возможность в проект. Приехать и перезаписать готовую метку у вас мы не сможем.</p>',
					'Какие сроки изготовления и доставки?'    => '<p>Типовые носители — от нескольких дней. Доставляем по Москве и по России; условия — в разделе «Доставка и оплата».</p>',
					'Что делать, если метка не работает?'     => '<p>На изделия действует гарантия — при браке заменяем носитель. Подробности в разделе «Гарантия и возврат».</p>',
					'Делаете ли брендирование?'               => '<p>Да. Наносим логотип, подбираем материал, форму и отделку под ваш фирменный стиль.</p>',
				)
			);
			?>
		</div>
	</section>

	<!-- ==================== CTA ==================== -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Не нашли ответ?</h2>
				<p class="nfc-cta__sub">Напишите или позвоните — поможем с выбором, заказом и настройкой.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li>Москва</li>
				</ul>
			</div>
			<div class="nfc-cta__text nfc-reveal" style="text-align:left">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="https://t.me/nfc_msk" target="_blank" rel="noopener">Написать в Telegram</a>
				<p class="nfc-cta__sub" style="margin-top:18px">Пишите в Telegram <a href="https://t.me/nfc_msk" style="color:var(--gold)" target="_blank" rel="noopener">@nfc_msk</a> — ответим быстро.</p>
			</div>
		</div>
	</section>

	<?php
	$nfc_editor   = trim( get_post_field( 'post_content', get_queried_object_id() ) );
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'pomoshch' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
