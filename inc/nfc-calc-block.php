<?php
/**
 * NFC MSK — блок «Сетка цен + калькулятор» с живым конструктором.
 * Переиспользуется на страницах товаров и на главной.
 *
 * Ожидает: $nfc_calc_tiers (array), $nfc_calc_min (int), $nfc_calc_product (slug).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$tiers = isset( $nfc_calc_tiers ) ? $nfc_calc_tiers : array();
$min   = isset( $nfc_calc_min ) ? (int) $nfc_calc_min : ( $tiers ? (int) min( array_keys( $tiers ) ) : 0 );
$nfc_pv_types = array( 'vizitki', 'karty', 'stikery', 'breloki', 'bejdzhi', 'tablichki' );
$product      = ( isset( $nfc_calc_product ) && in_array( $nfc_calc_product, $nfc_pv_types, true ) ) ? $nfc_calc_product : 'vizitki';
if ( empty( $tiers ) ) {
	return;
}
?>
<!-- Сетка цен по тиражам (цена за 1 шт) -->
<div class="nfc-tiers nfc-reveal">
	<?php foreach ( $tiers as $qty => $price ) : ?>
		<div class="nfc-tier<?php echo ( $price === min( $tiers ) ) ? ' nfc-tier--best' : ''; ?>">
			<span class="nfc-tier__qty">от <?php echo esc_html( $qty ); ?> шт</span>
			<span class="nfc-tier__price"><?php echo esc_html( number_format( $price, 0, '', ' ' ) ); ?></span>
			<span class="nfc-tier__unit">руб/шт</span>
		</div>
	<?php endforeach; ?>
</div>

<!-- Калькулятор -->
<div class="nfc-calc nfc-reveal" data-tiers='<?php echo esc_attr( wp_json_encode( $tiers ) ); ?>' data-min="<?php echo esc_attr( $min ); ?>">
	<div class="nfc-calc__head">
		<h3 class="nfc-calc__title">Калькулятор стоимости</h3>
		<p class="nfc-calc__note">Считаем до 2000 шт. Больше — индивидуальный расчёт. Точную цену подтвердим по заявке.</p>
	</div>
	<div class="nfc-calc__body">
		<div class="nfc-calc__controls">
			<span class="nfc-calc__label">Количество, шт</span>
			<div class="nfc-calc__qty">
				<button type="button" class="nfc-calc__step" data-dec aria-label="Уменьшить">−</button>
				<input class="nfc-calc__input" type="number" min="1" value="100" inputmode="numeric">
				<button type="button" class="nfc-calc__step" data-inc aria-label="Увеличить">+</button>
			</div>
			<div class="nfc-calc__presets">
				<?php foreach ( array_keys( $tiers ) as $pq ) : ?>
					<button type="button" class="nfc-calc__preset" data-qty="<?php echo esc_attr( $pq ); ?>"><?php echo esc_html( $pq ); ?></button>
				<?php endforeach; ?>
			</div>

			<div class="nfc-calc__options">
				<label class="nfc-calc__opt nfc-calc__opt--select">
					<span>Дизайн</span>
					<select class="nfc-opt-design">
						<option value="0">Свой макет — 0 руб</option>
						<option value="1500">Подготовка макета / дизайн — +1 500 руб</option>
						<option value="3000">Сложный дизайн с нуля — от +3 000 руб</option>
					</select>
				</label>
				<label class="nfc-calc__opt"><input type="checkbox" data-perunit data-fx="qr" data-rate="0"><span>QR-код на дизайн — включено</span></label>
					<label class="nfc-calc__opt"><input type="checkbox" data-perunit data-fx="team" data-rate="1500"><span>Электронные визитки для команды — от 1 500 руб/сотрудник</span></label>
				<label class="nfc-calc__opt"><input type="checkbox" data-urgent><span>Срочное изготовление — +30%</span></label>
			</div>

			<!-- Справочно (в расчёт не входит) -->
			<ul class="nfc-calc__extras">
				<li><span>Футляр для карты</span><b>+800 руб/шт</b></li>
				<li><span>Фольгирование</span><b>15 руб/шт</b></li>
				<li><span>Доставка по Москве</span><b>+1 300 руб</b></li>
			</ul>
		</div>

		<div class="nfc-calc__side">
		<!-- Живой конструктор: превью меняется по выбранным опциям -->
		<div class="nfc-calc__preview" aria-hidden="true">
			<div class="nfc-pv">
				<div class="nfc-pv__card pv-type-<?php echo esc_attr( $product ); ?>" data-type="<?php echo esc_attr( $product ); ?>">
					<span class="nfc-pv__metal"></span>
					<span class="nfc-pv__chip"></span>
					<span class="nfc-pv__waves"></span>
					<span class="nfc-pv__qr"></span>
					<span class="nfc-pv__brand">NFC</span>
					<span class="nfc-pv__gloss"></span>
				</div>
				<span class="nfc-pv__note">Превью носителя</span>
			</div>
		</div>
		<div class="nfc-calc__result">
			<div class="nfc-calc__warn" hidden>Минимальный заказ — от <b class="nfc-calc__warn-min"><?php echo esc_html( $min ); ?></b> шт.</div>
			<div class="nfc-calc__indiv" hidden>
				<b>Индивидуальный расчёт</b>
				<span>Тираж больше 2000 шт считаем по заявке.</span>
			</div>
			<div class="nfc-calc__lines">
				<div class="nfc-calc__row"><span>Цена за штуку</span><b class="nfc-calc__unit">—</b></div>
				<div class="nfc-calc__row"><span>Тираж</span><b class="nfc-calc__goods">—</b></div>
				<div class="nfc-calc__row nfc-calc__row--opt" hidden><span>Доп. услуги</span><b class="nfc-calc__extra">—</b></div>
				<div class="nfc-calc__row nfc-calc__row--opt" hidden><span>Срочность +30%</span><b class="nfc-calc__urg">—</b></div>
				<div class="nfc-calc__row nfc-calc__row--total"><span>Итого</span><b class="nfc-calc__total">—</b></div>
			</div>
			<div class="nfc-calc__terms">
				<p>Заказы запускаем в работу после согласования макета и оплаты.</p>
				<p>Стандартный срок — до 5 рабочих дней для небольших заказов, дальше зависит от продукции и считается индивидуально.</p>
				<p>Для заказов до 150 000 руб — 100% предоплата. Цены ориентировочные; точную стоимость и срок подтвердим по заявке.</p>
				<p class="nfc-calc__actual">Цены и сроки указаны на <?php echo esc_html( gmdate( 'Y' ) ); ?> год.</p>
			</div>
			<a class="nfc-btn nfc-btn--primary nfc-btn--block" href="#nfc-cta">Оставить заявку</a>
		</div>
		</div>
	</div>
</div>
