<?php
/**
 * NFC MSK — требования к дизайн-макету карты (визитки/карты, 86х54 мм).
 * Подключается из nfc-item-render.php только для slug 'vizitki' и 'karty'.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="nfc-section nfc-section--alt nfc-section--tight">
	<div class="nfc-container nfc-container--read">
		<header class="nfc-section__head nfc-reveal">
			<span class="nfc-section__eyebrow">Перед печатью</span>
			<h2 class="nfc-section__title">Требования к дизайн-макету карты</h2>
		</header>
		<p class="nfc-prices__lead nfc-reveal">Размер карты — 86 × 54 мм. Пришлите свой макет с учётом параметров ниже — отправим карту в печать без доработок. Если готового макета нет, поможем разработать дизайн с нуля — эта услуга есть в калькуляторе выше.</p>
		<ul class="nfc-facts nfc-reveal">
			<li><span class="nfc-facts__k">Размер макета</span><span class="nfc-facts__v">86 × 54 мм + 0,5 мм навылет с каждой стороны</span></li>
			<li><span class="nfc-facts__k">Фон на всю карту</span><span class="nfc-facts__v">2048 × 1300 px</span></li>
			<li><span class="nfc-facts__k">Разрешение изображений</span><span class="nfc-facts__v">600–1200 dpi</span></li>
			<li><span class="nfc-facts__k">Логотипы и графика</span><span class="nfc-facts__v">в векторном формате (AI, EPS, PDF или SVG)</span></li>
			<li><span class="nfc-facts__k">Цветовая модель</span><span class="nfc-facts__v">CMYK</span></li>
			<li><span class="nfc-facts__k">Печать белилами, лаком, фольгой на матовых картах или гравировка по металлу</span><span class="nfc-facts__v">макет в один цвет на прозрачном фоне</span></li>
			<li><span class="nfc-facts__k">Лак только на части макета</span><span class="nfc-facts__v">нужен отдельный слой с зонами покрытия</span></li>
			<li><span class="nfc-facts__k">Формат готового файла</span><span class="nfc-facts__v">PDF</span></li>
		</ul>
		<p class="nfc-prices__lead nfc-reveal" style="margin-top:8px">Не уверены, что макет собран правильно, — пришлите файл нам, проверим перед печатью и подскажем, что поправить.</p>
	</div>
</section>
