<?php
/**
 * NFC MSK — общий рендер страницы позиции (товар или решение).
 * Данные — inc/nfc-catalog.php по slug. Ожидает $nfc_group ('product'|'solution').
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nfc_group   = isset( $nfc_group ) ? $nfc_group : 'product';
$is_solution = ( 'solution' === $nfc_group );
$root        = $is_solution ? '/vse-resheniya/' : '/catalog/';
$root_label  = $is_solution ? 'Решения' : 'Каталог';

while ( have_posts() ) :
	the_post();
	$page_slug = get_post_field( 'post_name', get_the_ID() );
	// Страницы решений имеют «плоский» слаг resheniya-gotovye-{slug} — приводим к ключу данных.
	$slug      = $is_solution ? preg_replace( '/^resheniya-gotovye-/', '', $page_slug ) : $page_slug;
	$d         = nfc_item_get( $nfc_group, $slug );
	$title    = ! empty( $d['title'] ) ? $d['title'] : get_the_title();
	$subtitle = ! empty( $d['subtitle'] ) ? $d['subtitle'] : '';
	$intro    = ! empty( $d['intro'] ) ? $d['intro'] : '';
	$photo    = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : ( ! empty( $d['image'] ) ? $d['image'] : nfc_cover_url() );
	$tiers    = ! empty( $d['tiers'] ) ? $d['tiers'] : array();
	$is_indiv = ! empty( $d['individual'] ) || empty( $tiers );
	$min      = isset( $d['min'] ) ? (int) $d['min'] : ( $tiers ? (int) min( array_keys( $tiers ) ) : 0 );
	$card     = nfc_item_min_price( $d ); // самая низкая цена/шт (тираж 2000)
	$seo      = ! empty( $d['seo'] ) ? $d['seo'] : '';
	$others   = $is_solution ? nfc_solution_items() : nfc_catalog_items();
	?>

<main class="nfc-main nfc-itempage" id="nfc-content">

	<!-- Шапка -->
	<section class="nfc-pagehero">
		<div class="nfc-container">
			<nav class="nfc-breadcrumb" aria-label="Хлебные крошки">
				<a href="/">Главная</a><span aria-hidden="true">/</span><a href="<?php echo esc_url( $root ); ?>"><?php echo esc_html( $root_label ); ?></a><span aria-hidden="true">/</span><span><?php echo esc_html( $title ); ?></span>
			</nav>
			<h1 class="nfc-pagehero__title"><?php echo esc_html( $title ); ?><?php echo $is_solution ? '' : ' в Москве'; ?></h1>
			<?php if ( $subtitle ) : ?><p class="nfc-pagehero__sub"><?php echo esc_html( $subtitle ); ?></p><?php endif; ?>
			<?php if ( ! $is_solution ) : ?>
				<div class="nfc-pricebadge">
					<?php if ( $is_indiv ) : ?>
						<span class="nfc-pricebadge__from">Индивидуальный расчёт</span>
						<?php if ( $min ) : ?><span class="nfc-pricebadge__min">тираж от <?php echo esc_html( $min ); ?> шт</span><?php endif; ?>
					<?php else : ?>
						<span class="nfc-pricebadge__from">от <?php echo esc_html( number_format( $card, 0, '', ' ' ) ); ?> руб/шт</span>
						<span class="nfc-pricebadge__min">минимальный заказ от <?php echo esc_html( $min ); ?> шт</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="nfc-hero__actions" style="justify-content:center;margin-top:26px">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="#nfc-cta">Рассчитать стоимость</a>
				<a class="nfc-btn nfc-btn--ghost nfc-btn--lg" href="https://t.me/nfc_msk" target="_blank" rel="noopener">Написать в Telegram</a>
			</div>
		</div>
	</section>

	<!-- Витрина товара + описание -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-itemshow">
			<?php $has_photo = has_post_thumbnail() || ! empty( $d['image'] ); ?>
			<div class="nfc-itemshow__media nfc-reveal">
				<div class="nfc-showcard">
					<?php if ( $has_photo ) : ?>
						<img class="nfc-showcard__img" src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
					<?php else : ?>
						<?php require get_stylesheet_directory() . '/inc/nfc-illustration.php'; ?>
					<?php endif; ?>
					<span class="nfc-showcard__badge">NFC</span>
				</div>
			</div>
			<div class="nfc-itemshow__text nfc-reveal">
				<span class="nfc-section__eyebrow"><?php echo $is_solution ? 'Решение' : 'О продукте'; ?></span>
				<?php if ( $intro ) : ?><p class="nfc-itemshow__lead"><?php echo esc_html( $intro ); ?></p><?php endif; ?>
				<ul class="nfc-facts">
					<?php if ( ! $is_solution && ! $is_indiv ) : ?>
						<li><span class="nfc-facts__k">Минимальный заказ</span><span class="nfc-facts__v">от <?php echo esc_html( $min ); ?> шт</span></li>
						<li><span class="nfc-facts__k">Цена за штуку</span><span class="nfc-facts__v">от <?php echo esc_html( number_format( $card, 0, '', ' ' ) ); ?> руб</span></li>
					<?php elseif ( ! $is_solution ) : ?>
						<li><span class="nfc-facts__k">Тираж</span><span class="nfc-facts__v">от <?php echo esc_html( $min ); ?> шт</span></li>
						<li><span class="nfc-facts__k">Стоимость</span><span class="nfc-facts__v">по запросу</span></li>
					<?php endif; ?>
					<li><span class="nfc-facts__k">Ссылка</span><span class="nfc-facts__v">записываем под задачу</span></li>
					<li><span class="nfc-facts__k">Брендирование</span><span class="nfc-facts__v">логотип и дизайн</span></li>
					<li><span class="nfc-facts__k">Изготовление</span><span class="nfc-facts__v">от нескольких дней</span></li>
				</ul>
				<div class="nfc-itemshow__actions">
					<a class="nfc-btn nfc-btn--primary" href="#nfc-cta"><?php echo $is_solution ? 'Обсудить' : 'Рассчитать'; ?></a>
					<a class="nfc-btn nfc-btn--ghost" href="https://t.me/nfc_msk" target="_blank" rel="noopener">Telegram</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Демо мемориальной страницы: слайд-шоу памяти по касанию (только «памятники») -->
	<?php if ( in_array( $slug, array( 'pamyatniki', 'pamyat' ), true ) ) : ?>
		<?php require get_stylesheet_directory() . '/inc/nfc-memorial-demo.php'; ?>
	<?php endif; ?>

	<!-- Калькулятор + цены -->
	<?php if ( ! $is_solution ) : ?>
	<section class="nfc-section nfc-section--alt nfc-section--tight">
		<div class="nfc-container nfc-container--read">
			<header class="nfc-section__head nfc-reveal"><span class="nfc-section__eyebrow">Стоимость</span><h2 class="nfc-section__title">Цены и расчёт</h2></header>
			<p class="nfc-prices__lead nfc-reveal">Изготовление NFC-продукции от 10 шт. Оптовые цены — от 100 шт.</p>

			<?php if ( $is_indiv ) : ?>
				<div class="nfc-indiv nfc-reveal">
					<h3 class="nfc-indiv__title">Индивидуальный расчёт</h3>
					<p class="nfc-indiv__text">Стоимость зависит от формы, материала и тиража. Прототип (1–10 шт) и тираж (от <?php echo esc_html( $min ); ?> шт) считаем под задачу. Оставьте заявку — рассчитаем и назовём цену.</p>
					<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="#nfc-cta">Оставить заявку на расчёт</a>
				</div>
			<?php else : ?>
				<?php
				$nfc_calc_tiers   = $tiers;
				$nfc_calc_min     = $min;
				$nfc_calc_product = $slug; // тип носителя для живого превью
				require get_stylesheet_directory() . '/inc/nfc-calc-block.php';
				?>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- Требования к дизайн-макету (только карты и визитки — размер 86х54 мм) -->
	<?php if ( in_array( $slug, array( 'vizitki', 'karty' ), true ) ) : ?>
		<?php require get_stylesheet_directory() . '/inc/nfc-design-requirements.php'; ?>
	<?php endif; ?>

	<!-- Преимущества -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">
			<div class="nfc-grid nfc-grid--3">
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-factory"></use></svg><h3 class="nfc-feature__title">Изготовление в Москве</h3><p class="nfc-feature__desc">Печать, чипы и брендирование под ключ.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-refresh"></use></svg><h3 class="nfc-feature__title">QR-код в дополнение</h3><p class="nfc-feature__desc">Дублируем ссылку QR-кодом — сработает на любом смартфоне, включая iPhone.</p></div>
				<div class="nfc-feature nfc-reveal"><svg class="nfc-ico nfc-ico--lg" aria-hidden="true" focusable="false"><use href="#ic-shield"></use></svg><h3 class="nfc-feature__title">Гарантия</h3><p class="nfc-feature__desc">Отвечаем за чипы и печать, меняем при браке.</p></div>
			</div>
		</div>
	</section>

	<!-- Отзывы на Яндексе -->
	<?php require get_stylesheet_directory() . '/inc/nfc-reviews-widget.php'; ?>

	<!-- FAQ -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container nfc-container--narrow">
			<header class="nfc-section__head nfc-reveal"><span class="nfc-section__eyebrow">FAQ</span><h2 class="nfc-section__title">Вопросы и ответы</h2></header>
			<?php
			nfc_faq(
				array(
					'Сколько стоит и от чего зависит цена?' => '<p>Цена зависит от тиража, материала и брендирования. Оставьте заявку — рассчитаем под вашу задачу.</p>',
					'Можно ли нанести логотип и дизайн?'    => '<p>Да. Наносим логотип, подбираем материал, форму и отделку под ваш фирменный стиль.</p>',
					'Сроки и доставка по Москве?'           => '<p>Типовые носители — от нескольких дней. Доставляем по Москве и по России.</p>',
					'Нужно ли клиенту приложение?'          => '<p>Нет. NFC поддерживают практически все современные смартфоны — достаточно поднести телефон.</p>',
				)
			);
			?>
		</div>
	</section>

	<!-- Перелинковка: связанные позиции другой группы (товар ↔ решения) -->
	<?php $nfc_cross = nfc_related_cross( $nfc_group, $slug ); ?>
	<?php if ( ! empty( $nfc_cross ) ) : ?>
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal">
				<span class="nfc-section__eyebrow"><?php echo $is_solution ? 'Носители для решения' : 'Готовые сценарии'; ?></span>
				<h2 class="nfc-section__title"><?php echo $is_solution ? 'На чём это работает' : 'Где применяют «' . esc_html( $title ) . '»'; ?></h2>
			</header>
			<div class="nfc-chips nfc-reveal">
				<?php foreach ( $nfc_cross as $nfc_cl ) : ?>
					<a class="nfc-chip" href="<?php echo esc_url( $nfc_cl['url'] ); ?>"><?php echo esc_html( $nfc_cl['label'] ); ?></a>
				<?php endforeach; ?>
				<a class="nfc-chip" href="<?php echo esc_url( $is_solution ? '/catalog/' : nfc_solutions_url() ); ?>"><?php echo $is_solution ? 'Весь каталог' : 'Все решения'; ?> →</a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- Другие позиции -->
	<section class="nfc-section nfc-section--tight">
		<div class="nfc-container">
			<header class="nfc-section__head nfc-reveal"><h2 class="nfc-section__title"><?php echo $is_solution ? 'Другие решения' : 'Другие товары'; ?></h2></header>
			<div class="nfc-chips nfc-reveal">
				<?php
				foreach ( $others as $oslug => $oitem ) :
					if ( $oslug === $slug ) {
						continue;
					}
					?>
					<a class="nfc-chip" href="<?php echo esc_url( $is_solution ? nfc_solution_url( $oslug ) : nfc_product_url( $oslug ) ); ?>"><?php echo esc_html( $oitem['title'] ); ?></a>
				<?php endforeach; ?>
				<a class="nfc-chip" href="<?php echo esc_url( $root ); ?>"><?php echo $is_solution ? 'Все решения' : 'Весь каталог'; ?> →</a>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section class="nfc-cta" id="nfc-cta">
		<div class="nfc-container nfc-cta__inner">
			<div class="nfc-cta__text nfc-reveal">
				<h2 class="nfc-cta__title">Заказать «<?php echo esc_html( $title ); ?>»</h2>
				<p class="nfc-cta__sub">Оставьте заявку — подберём носитель, тираж и брендирование, назовём цену.</p>
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
	// SEO-текст: редактор страницы → развёрнутый текст из nfc-seo-texts → короткий из данных.
	$nfc_key    = ( $is_solution ? 'reshenie-' : '' ) . $slug;
	$nfc_editor = trim( get_the_content() );
	if ( '' !== $nfc_editor ) {
		$nfc_seo_html = apply_filters( 'the_content', get_the_content() );
	} else {
		$nfc_seo_html = nfc_seo_text( $nfc_key );
		if ( '' === $nfc_seo_html && $seo ) {
			$nfc_seo_html = wpautop( esc_html( $seo ) );
		}
	}
	require get_stylesheet_directory() . '/inc/nfc-seo-block.php';
	?>

</main>

<?php endwhile; ?>
