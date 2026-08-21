<?php
/**
 * Template Name: NFC MSK — Главная
 *
 * Премиальная главная: hero с анимацией телефона и NFC, каталог, процесс,
 * преимущества, клиенты, блог, FAQ, SEO-текст, заявка.
 * Карточки — обычный HTML, правятся руками.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
?>

<main class="nfc-main" id="nfc-content">

	<!-- ==================== HERO ==================== -->
	<section class="nfc-hero nfc-hero--split">
		<div class="nfc-container nfc-hero__inner">
			<div class="nfc-hero__text">
				<span class="nfc-hero__eyebrow">Изготовление NFC в Москве</span>
				<h1 class="nfc-hero__title">NFC для бизнеса <span>в Москве</span></h1>
				<p class="nfc-hero__lead">Изготавливаем и брендируем NFC-визитки, карты, стикеры, брелоки и таблички. Отзывы, меню, Wi-Fi и оплата — по одному касанию смартфона.</p>
				<div class="nfc-hero__actions">
					<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="#nfc-cta">Рассчитать стоимость</a>
					<a class="nfc-btn nfc-btn--ghost nfc-btn--lg" href="/catalog/">Смотреть каталог</a>
				</div>
				<ul class="nfc-hero__usps">
					<li>Работаем с физлицами и юрлицами</li>
					<li>Поможем разработать макет</li>
					<li>Доставка по Москве и РФ</li>
				</ul>
			</div>

			<!-- Анимация «Касание телефоном»: карта заезжает ПОД телефон слева
			     (NFC-антенна), вспышка + волны + искры у края корпуса, на экране сценарий:
			     1-е касание — меню, 2-е — отзыв, 3-е — визитка. 3D-наклон за курсором. -->
			<div class="nfc-hero__visual" aria-hidden="true">
				<div class="nfc-tapscene">
					<div class="nfc-tapscene__tilt">
					<div class="nfc-tapscene__float">
					<!-- Телефон — iPhone 17 Pro Max, титановый серый -->
					<div class="nfc-tapscene__phone">
						<span class="nfc-tapscene__btn nfc-tapscene__btn--action"></span>
						<span class="nfc-tapscene__btn nfc-tapscene__btn--vol"></span>
						<span class="nfc-tapscene__btn nfc-tapscene__btn--power"></span>
						<span class="nfc-tapscene__island"></span>
						<div class="nfc-tapscene__screen">
							<!-- После касания на экране разворачивается мини-сценарий -->
							<!-- 1. Электронное меню -->
							<div class="nfc-tapscene__app nfc-tapscene__app--1">
								<span class="nfc-ta__head">Меню</span>
								<div class="nfc-ta__list">
									<div class="nfc-ta__item"><span>Том Ям</span><b>540 руб</b></div>
									<div class="nfc-ta__item"><span>Филадельфия</span><b>690 руб</b></div>
									<div class="nfc-ta__item"><span>Карбонара</span><b>620 руб</b></div>
									<div class="nfc-ta__item"><span>Тирамису</span><b>380 руб</b></div>
								</div>
							</div>
							<!-- 2. Отзыв -->
							<div class="nfc-tapscene__app nfc-tapscene__app--2">
								<span class="nfc-ta__head">Ваш отзыв</span>
								<span class="nfc-ta__stars">★★★★★</span>
								<span class="nfc-ta__line"></span>
								<span class="nfc-ta__line nfc-ta__line--short"></span>
								<span class="nfc-ta__btn">Отправить</span>
							</div>
							<!-- 3. NFC-визитка -->
							<div class="nfc-tapscene__app nfc-tapscene__app--3">
								<span class="nfc-ta__ava">А</span>
								<span class="nfc-ta__name">Артём</span>
								<span class="nfc-ta__role">NFC MSK</span>
								<div class="nfc-ta__list">
									<div class="nfc-ta__item"><span>Телефон</span><b>+7…</b></div>
									<div class="nfc-ta__item"><span>Telegram</span><b>@nfc</b></div>
								</div>
								<span class="nfc-ta__btn">Сохранить</span>
							</div>
							<span class="nfc-tapscene__idle">NFC</span>
						</div>
					</div>

					<!-- NFC-карта: прилетает слева и заезжает ПОД телефон -->
					<div class="nfc-tapscene__card">
						<span class="nfc-tapscene__chip"></span>
						<svg class="nfc-tapscene__cardwaves" viewBox="0 0 30 30" aria-hidden="true" focusable="false"><path d="M9 12 a7 7 0 0 1 0 6"/><path d="M13 9 a12 12 0 0 1 0 12"/><path d="M17 6 a17 17 0 0 1 0 18"/></svg>
						<span class="nfc-tapscene__brand">NFC MSK</span>
						<span class="nfc-tapscene__sheen"></span>
					</div>

					<!-- Точка контакта: вспышка, волны и искры -->
					<span class="nfc-tapscene__flash"></span>
					<span class="nfc-tapscene__wave"></span>
					<span class="nfc-tapscene__wave nfc-tapscene__wave--2"></span>
					<span class="nfc-tapscene__wave nfc-tapscene__wave--3"></span>
					<span class="nfc-tapscene__spark" style="--dx:-58px;--dy:-34px"></span>
					<span class="nfc-tapscene__spark" style="--dx:-70px;--dy:8px"></span>
					<span class="nfc-tapscene__spark" style="--dx:-44px;--dy:-58px"></span>
					<span class="nfc-tapscene__spark" style="--dx:-52px;--dy:42px"></span>
					<span class="nfc-tapscene__spark" style="--dx:-16px;--dy:-66px"></span>

					</div><!-- /float -->
					</div><!-- /tilt -->
				</div>
				<!-- Лента сценариев: подсвечивается синхронно с экраном телефона -->
				<div class="nfc-tapscene__ribbon" aria-hidden="true">
					<span class="nfc-ribbon__chip nfc-ribbon__chip--1">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="3" width="12" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/></svg>
						<span>Меню</span>
					</span>
					<span class="nfc-ribbon__chip nfc-ribbon__chip--2">
						<svg viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26"/></svg>
						<span>Отзывы</span>
					</span>
					<span class="nfc-ribbon__chip nfc-ribbon__chip--3">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3.2"/><path d="M5.5 20a6.5 6.5 0 0 1 13 0"/></svg>
						<span>Визитка</span>
					</span>
				</div>
			</div>
		</div>
	</section>

	<!-- ==================== КАТАЛОГ ==================== -->
	<section class="nfc-section" id="catalog">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Каталог</span>
				<h2 class="nfc-section__title">Каталог NFC-продуктов</h2>
				<p class="nfc-section__sub">NFC-визитки, карты, метки, стикеры, брелоки и таблички — изготовление и брендирование под ключ.</p>
			</header>

			<?php require get_stylesheet_directory() . '/inc/nfc-catalog-grid.php'; ?>

			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="/catalog/">Весь каталог</a></div>
		</div>
	</section>

	<!-- ==================== ЦЕНЫ И КАЛЬКУЛЯТОР ==================== -->
	<section class="nfc-section nfc-section--alt" id="prices">
		<div class="nfc-container nfc-container--read">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Цены</span>
				<h2 class="nfc-section__title">Цены и калькулятор</h2>
				<p class="nfc-section__sub">Изготовление NFC-продукции от 10 шт. Оптовые цены — от 100 шт. Пример на NFC-визитках:</p>
			</header>
			<?php
			$nfc_v          = nfc_item_get( 'product', 'vizitki' );
			$nfc_calc_tiers = ! empty( $nfc_v['tiers'] ) ? $nfc_v['tiers'] : array();
			$nfc_calc_min   = ! empty( $nfc_v['min'] ) ? $nfc_v['min'] : 10;
			require get_stylesheet_directory() . '/inc/nfc-calc-block.php';
			?>
			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="/catalog/">Цены на все товары</a></div>
		</div>
	</section>

	<!-- ==================== КАК РАБОТАЕТ NFC ==================== -->
	<section class="nfc-section" id="how">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Процесс</span>
				<h2 class="nfc-section__title">Как работает NFC</h2>
				<p class="nfc-section__sub">Четыре шага от идеи до готового носителя с настроенным сценарием.</p>
			</header>
			<div class="nfc-steps">
				<div class="nfc-step nfc-reveal"><span class="nfc-step__num">01</span><h3 class="nfc-step__title">Выбираете сценарий</h3><p class="nfc-step__desc">Отзывы, меню, визитка, Wi-Fi, лояльность или доступ.</p></div>
				<div class="nfc-step nfc-reveal"><span class="nfc-step__num">02</span><h3 class="nfc-step__title">Изготавливаем носитель</h3><p class="nfc-step__desc">Карта, табличка, стикер или брелок с вашим брендом.</p></div>
				<div class="nfc-step nfc-reveal"><span class="nfc-step__num">03</span><h3 class="nfc-step__title">Записываем ссылку</h3><p class="nfc-step__desc">Настраиваем метку под нужный адрес или действие.</p></div>
				<div class="nfc-step nfc-reveal"><span class="nfc-step__num">04</span><h3 class="nfc-step__title">Клиент касается — готово</h3><p class="nfc-step__desc">Смартфон открывает страницу без приложений.</p></div>
			</div>
		</div>
	</section>

	<!-- ==================== ПОЧЕМУ NFC MSK ==================== -->
	<section class="nfc-section nfc-section--alt" id="why">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Почему мы</span>
				<h2 class="nfc-section__title">Почему выбирают NFC MSK</h2>
				<p class="nfc-section__sub">Своё производство NFC в Москве, брендирование и настройка любой метки.</p>
			</header>
			<div class="nfc-grid nfc-grid--3">
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-factory"></use></svg><h3 class="nfc-feature__title">Изготовление в Москве</h3><p class="nfc-feature__desc">Печать, чипы и брендирование под контролем качества.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-pencil"></use></svg><h3 class="nfc-feature__title">Помощь с макетом</h3><p class="nfc-feature__desc">Подготовим дизайн-макет под требования печати, если своего варианта пока нет.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-bolt"></use></svg><h3 class="nfc-feature__title">Быстрый запуск</h3><p class="nfc-feature__desc">Готовый носитель и настройка под ключ за несколько дней.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-gem"></use></svg><h3 class="nfc-feature__title">Премиальный дизайн</h3><p class="nfc-feature__desc">Носители под ваш бренд: материал, форма, отделка.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-shield"></use></svg><h3 class="nfc-feature__title">Гарантия</h3><p class="nfc-feature__desc">Отвечаем за чипы и печать, заменяем при браке.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-support"></use></svg><h3 class="nfc-feature__title">Поддержка</h3><p class="nfc-feature__desc">Помогаем настроить сценарий и обучаем команду.</p></div>
			</div>
		</div>
	</section>

	<!-- ==================== НАШИ РАБОТЫ ==================== -->
	<section class="nfc-section" id="works">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Наши работы</span>
				<h2 class="nfc-section__title">Проекты, которые уже работают</h2>
				<p class="nfc-section__sub">NFC-носители и сценарии, которые мы изготовили и настроили для бизнеса в Москве.</p>
			</header>
			<?php $nfc_works_limit = 6; require get_stylesheet_directory() . '/inc/nfc-works-grid.php'; ?>
			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="/nashi-raboty/">Все работы</a></div>
		</div>
	</section>

	<!-- ==================== КЛИЕНТЫ / НАМ ДОВЕРЯЮТ ==================== -->
	<section class="nfc-section nfc-section--alt" id="clients">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Клиенты</span>
				<h2 class="nfc-section__title">Нам доверяют бизнесы Москвы</h2>
				<p class="nfc-section__sub">Рестораны, салоны, клиники, отели, магазины и фитнес-клубы выбирают NFC-носители NFC MSK.</p>
			</header>
			<div class="nfc-clients nfc-reveal" aria-label="Сферы клиентов" style="margin-top:0;border-top:none;padding-top:0">
				<span>Рестораны</span><span>Салоны красоты</span><span>Стоматологии</span><span>Отели</span><span>Магазины</span><span>Фитнес-клубы</span>
			</div>
		</div>

		<!-- Логотипы компаний-клиентов — бегущая лента -->
		<?php require get_stylesheet_directory() . '/inc/nfc-logos-marquee.php'; ?>
	</section>

	<!-- ==================== ОТЗЫВЫ ЯНДЕКС ==================== -->
	<?php $nfc_ya_alt = true; require get_stylesheet_directory() . '/inc/nfc-reviews-widget.php'; ?>

	<!-- ==================== FAQ ==================== -->
	<section class="nfc-section" id="faq">
		<div class="nfc-container nfc-container--narrow">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">FAQ</span>
				<h2 class="nfc-section__title">Вопросы и ответы</h2>
			</header>
			<?php
			nfc_faq(
				array(
					'Что такое NFC и как это работает?'         => '<p>Клиент подносит смартфон к NFC-продукции — телефон открывает нужную страницу: меню, отзывы, визитку или Wi-Fi. Чтобы считать метку, приложение не нужно; оно требуется только для программирования (записи) метки — это делаем мы.</p>',
					'Можно ли купить NFC в Москве с доставкой?' => '<p>Да. Изготавливаем NFC в Москве и доставляем по городу и по России. Условия — в разделе «Доставка и оплата».</p>',
					'Можно ли поменять ссылку на метке позже?'  => '<p>Ссылку записываем при изготовлении. Менять её удалённо в будущем можно, только если заложить это в проект заранее — тогда подберём подходящее решение. Приехать и перезаписать готовую метку у вас мы не сможем, поэтому предупредите о такой задаче до заказа.</p>',
					'Делаете ли брендирование и логотип?'       => '<p>Да. Наносим логотип, подбираем материал, форму и отделку под ваш фирменный стиль.</p>',
				)
			);
			?>
			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="/pomoshch/">Центр поддержки</a></div>
		</div>
	</section>

	<!-- ==================== CTA ==================== -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Заказать NFC в Москве</h2>
				<p class="nfc-cta__sub">Оставьте заявку — подберём носитель, тираж и брендирование, рассчитаем стоимость.</p>
				<ul class="nfc-cta__contacts">
					<li><a href="tel:+79628800715">+7 (962) 880-07-15</a></li>
					<li><a href="mailto:nfc.v.msk@mail.ru">nfc.v.msk@mail.ru</a></li>
					<li>Москва</li>
				</ul>
			</div>
			<form class="nfc-form nfc-reveal" action="https://formspree.io/f/mwvdwqar" method="POST">
					<input type="hidden" name="_subject" value="Заявка с сайта NFC MSK">
				<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-name">Имя</label><input class="nfc-form__input" id="nfc-name" name="Имя" type="text" required placeholder="Как к вам обращаться"></div>
					<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-email">Email</label><input class="nfc-form__input" id="nfc-email" name="email" type="email" required placeholder="you@example.com"></div>
				<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-phone">Телефон или Telegram</label><input class="nfc-form__input" id="nfc-phone" name="Телефон" type="text" placeholder="+7 ___ ___-__-__"></div>
				<div class="nfc-form__row"><label class="nfc-form__label" for="nfc-task">Задача</label><textarea class="nfc-form__input" id="nfc-task" name="message" rows="3" placeholder="Например: NFC-визитки с логотипом, 200 шт"></textarea></div>
				<button class="nfc-btn nfc-btn--primary nfc-btn--block nfc-btn--lg" type="submit">Отправить заявку</button>
				<p class="nfc-form__note">Нажимая кнопку, вы соглашаетесь с <a href="/politika-konfidentsialnosti/">политикой конфиденциальности</a>.</p>
			</form>
		</div>
	</section>

	<!-- ==================== БЛОГ ==================== -->
	<section class="nfc-section" id="blog">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow">Блог</span>
				<h2 class="nfc-section__title">Полезное о NFC</h2>
				<p class="nfc-section__sub">Что такое NFC, как работает и как записать метку.</p>
			</header>
			<div class="nfc-grid nfc-grid--4">
				<a class="nfc-article nfc-reveal" href="/blog/chto-takoe-nfc/"><div class="nfc-article__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-book"></use></svg></div><div class="nfc-article__body"><span class="nfc-article__cat">База знаний</span><h3 class="nfc-article__title">Что такое NFC</h3><p class="nfc-article__desc">Простыми словами о технологии и применении.</p></div></a>
				<a class="nfc-article nfc-reveal" href="/blog/kak-rabotaet-nfc/"><div class="nfc-article__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-gear"></use></svg></div><div class="nfc-article__body"><span class="nfc-article__cat">База знаний</span><h3 class="nfc-article__title">Как работает NFC</h3><p class="nfc-article__desc">Что происходит при касании и почему безопасно.</p></div></a>
				<a class="nfc-article nfc-reveal" href="/blog/nfc-ili-qr/"><div class="nfc-article__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-compare"></use></svg></div><div class="nfc-article__body"><span class="nfc-article__cat">Сравнения</span><h3 class="nfc-article__title">NFC или QR-код</h3><p class="nfc-article__desc">Что выбрать для вашей задачи.</p></div></a>
				<a class="nfc-article nfc-reveal" href="/blog/kak-zapisat-nfc/"><div class="nfc-article__media"><svg class="nfc-ico" aria-hidden="true" focusable="false"><use href="#ic-pencil"></use></svg></div><div class="nfc-article__body"><span class="nfc-article__cat">Инструкции</span><h3 class="nfc-article__title">Как записать NFC-метку</h3><p class="nfc-article__desc">Пошагово о записи и перезаписи ссылки.</p></div></a>
			</div>
			<div class="nfc-section__more"><a class="nfc-btn nfc-btn--ghost" href="/blog/">Все статьи</a></div>
		</div>
	</section>

	<!-- ==================== SEO-ТЕКСТ ==================== -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-container--narrow">
			<div class="nfc-seo nfc-reveal" id="nfc-seo">
				<button class="nfc-seo__toggle" aria-expanded="false" aria-controls="nfc-seo-body">Подробнее о NFC в Москве <span class="nfc-seo__sign" aria-hidden="true">+</span></button>
				<div class="nfc-seo__body" id="nfc-seo-body"><div class="nfc-prose nfc-prose--seo">
					<h2>NFC в Москве — изготовление и производство под ключ</h2>
					<p>NFC MSK — это производство NFC в Москве: мы делаем и брендируем NFC-визитки, NFC-карты, NFC-метки, NFC-стикеры, брелоки, браслеты, бейджи и таблички. Купить NFC в Москве можно под любую задачу бизнеса: визитка с NFC-чипом и QR-кодом, карта лояльности, метка для сайта, меню, отзывов или Wi-Fi.</p>
					<p>Изготовление NFC на заказ в Москве: подбираем материал и форму, наносим логотип и дизайн, записываем и при необходимости перезаписываем ссылку. NFC для бизнеса — это электронное меню для ресторана, сбор отзывов в Яндекс и Google по касанию, бесконтактные карты клиента, чаевые по NFC и пропуска для офиса. Работаем со стоматологиями, салонами красоты, отелями, фитнес-клубами, автосервисами и магазинами. Доставка по Москве и всей России.</p>
				</div></div>
			</div>
		</div>
	</section>

	<?php
	$nfc_editor   = trim( get_post_field( 'post_content', get_queried_object_id() ) );
	$nfc_seo_html = '' !== $nfc_editor ? apply_filters( 'the_content', $nfc_editor ) : nfc_seo_text( 'home' );
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
