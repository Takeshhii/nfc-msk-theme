<?php
/**
 * Template Name: NFC MSK — О компании
 *
 * Доверительная страница. Весь текст — обычный HTML, правьте руками.
 * Цифры в блоке статистики и тексты замените на свои реальные.
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
				<a href="/">Главная</a><span aria-hidden="true">/</span><span>О компании</span>
			</nav>
			<span class="nfc-pagehero__eyebrow">NFC MSK · Москва</span>
			<h1 class="nfc-pagehero__title">О компании</h1>
			<p class="nfc-pagehero__sub">Производим и настраиваем премиальные NFC-носители под бренд бизнеса — от визиток до табличек для отзывов.</p>
		</div>
	</section>

	<!-- ==================== КТО МЫ ==================== -->
	<section class="nfc-section">
		<div class="nfc-container nfc-split nfc-split--about">
			<div class="nfc-split__text nfc-reveal">
				<span class="nfc-section__eyebrow">Кто мы</span>
				<h2 class="nfc-section__title" style="text-align:left">NFC-решения с заботой о бренде</h2>
				<p>NFC MSK — московская команда, которая помогает бизнесу работать «в одно касание». Мы изготавливаем носители с NFC-чипом, брендируем их под фирменный стиль и настраиваем сценарии: отзывы, меню, визитки, Wi-Fi, лояльность и доступ.</p>
				<p>Своё производство позволяет контролировать качество печати и чипов. Ссылку записываем при изготовлении, а если планируете обновлять её удалённо в будущем — заложим эту возможность заранее. Мы отвечаем за результат и работаем с частными клиентами и организациями.</p>
			</div>
			<div class="nfc-split__media nfc-reveal">
				<div class="nfc-reviews nfc-aboutslider" data-slider>
					<button type="button" class="nfc-slider__arrow nfc-slider__arrow--prev" aria-label="Предыдущее фото">‹</button>
					<div class="nfc-slider__track">
						<?php
						$nfc_about_dir = get_stylesheet_directory_uri() . '/assets/img/about/';
						for ( $i = 1; $i <= 4; $i++ ) :
							?>
							<figure class="nfc-workslide">
								<div class="nfc-workslide__fallback">
									<svg class="nfc-workslide__ico" aria-hidden="true" focusable="false"><use href="#ic-factory"></use></svg>
									<span class="nfc-workslide__mark">NFC MSK</span>
								</div>
								<img class="nfc-workslide__img" src="<?php echo esc_url( $nfc_about_dir . 'about-' . $i . '.jpg' ); ?>" alt="Производство NFC MSK — фото <?php echo esc_attr( $i ); ?>" loading="lazy" onerror="this.style.display='none'">
							</figure>
						<?php endfor; ?>
					</div>
					<button type="button" class="nfc-slider__arrow nfc-slider__arrow--next" aria-label="Следующее фото">›</button>
					<div class="nfc-slider__dots" aria-hidden="true"></div>
				</div>
			</div>
		</div>
	</section>

	<!-- ==================== ЧЕМ ПОЛЕЗНЫ ==================== -->
	<section class="nfc-section">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Чем полезны бизнесу</span>
				<h2 class="nfc-section__title">Что мы делаем</h2>
			</header>
			<div class="nfc-grid nfc-grid--3">
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-gem"></use></svg><h3 class="nfc-feature__title">Брендирование</h3><p class="nfc-feature__desc">Материал, форма и отделка под ваш фирменный стиль и логотип.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-refresh"></use></svg><h3 class="nfc-feature__title">Настройка сценариев</h3><p class="nfc-feature__desc">Записываем и перезаписываем ссылки под нужное действие.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-bolt"></use></svg><h3 class="nfc-feature__title">Быстрый запуск</h3><p class="nfc-feature__desc">Готовое решение под ключ за несколько дней.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-shield"></use></svg><h3 class="nfc-feature__title">Гарантия</h3><p class="nfc-feature__desc">Отвечаем за чипы и печать, заменяем при браке.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-support"></use></svg><h3 class="nfc-feature__title">Поддержка</h3><p class="nfc-feature__desc">Помогаем настроить сценарий и обучаем команду.</p></div>
			</div>
		</div>
	</section>

	<!-- ==================== ОТЗЫВЫ ==================== -->
	<section class="nfc-section nfc-section--alt">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Доверие</span>
				<h2 class="nfc-section__title">Нам доверяют</h2>
			</header>
			<div class="nfc-grid nfc-grid--3">
				<blockquote class="nfc-quote nfc-reveal"><span class="nfc-quote__mark">“</span><p>Поток отзывов вырос в разы — гости оставляют их прямо за столом.</p><footer>Ресторан · Москва</footer></blockquote>
				<blockquote class="nfc-quote nfc-reveal"><span class="nfc-quote__mark">“</span><p>Электронное меню обновляем за минуту, без перепечати.</p><footer>Кафе · сеть</footer></blockquote>
				<blockquote class="nfc-quote nfc-reveal"><span class="nfc-quote__mark">“</span><p>NFC-визитки команды выглядят дорого и работают мгновенно.</p><footer>Агентство недвижимости</footer></blockquote>
			</div>
		</div>
	</section>

	<!-- ==================== РАЗДЕЛЫ О КОМПАНИИ ==================== -->
	<section class="nfc-section">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Подробнее</span>
				<h2 class="nfc-section__title">Разделы о нас</h2>
			</header>
			<div class="nfc-grid nfc-grid--3">
				<a class="nfc-card nfc-reveal" href="/catalog/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-karty"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Каталог</h3><p class="nfc-card__desc">Вся NFC-продукция: визитки, карты, метки, таблички.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/vse-resheniya/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-loyalnost"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Готовые решения</h3><p class="nfc-card__desc">Отзывы, меню, визитка, Wi-Fi, лояльность и доступ.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/dostavka-i-oplata/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-avto"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Доставка и оплата</h3><p class="nfc-card__desc">Способы оплаты, сроки и доставка по Москве и РФ.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/nashi_otzyvy/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-otzyvy"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Клиенты</h3><p class="nfc-card__desc">Компании, которые выбрали NFC MSK.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/pomoshch/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-support"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Помощь</h3><p class="nfc-card__desc">Доставка, оплата, гарантия и частые вопросы.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
				<a class="nfc-card nfc-reveal" href="/nashi-raboty/"><div class="nfc-card__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-book"></use></svg></div><div class="nfc-card__body"><h3 class="nfc-card__title">Наши работы</h3><p class="nfc-card__desc">Реальные проекты и результаты клиентов.</p><span class="nfc-card__cta">Подробнее <span>→</span></span></div></a>
			</div>
		</div>
	</section>

	<!-- ==================== CTA ==================== -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Обсудим ваш проект</h2>
				<p class="nfc-cta__sub">Расскажите задачу — подберём носитель и сценарий, рассчитаем стоимость.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li>Москва</li>
				</ul>
			</div>
			<div class="nfc-cta__text nfc-reveal" style="text-align:left">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="https://t.me/nfc_msk" target="_blank" rel="noopener">Связаться в Telegram</a>
				<p class="nfc-cta__sub" style="margin-top:18px">Или посмотрите <a href="/catalog/" style="color:var(--gold)">каталог продуктов</a>.</p>
			</div>
		</div>
	</section>

	<?php
	$nfc_editor   = trim( get_post_field( 'post_content', get_queried_object_id() ) );
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'o-kompanii' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
