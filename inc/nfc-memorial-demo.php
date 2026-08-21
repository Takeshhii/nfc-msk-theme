<?php
/**
 * NFC MSK — демо мемориальной страницы для «NFC для памятников».
 * Телефон со спокойным слайд-шоу памяти (фото → ФИО и даты → память → альбом).
 * Подключается из nfc-item-render.php для slug 'pamyatniki' и 'pamyat'.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="nfc-section nfc-section--alt nfc-section--tight nfc-memorial">
	<div class="nfc-container">
		<header class="nfc-section__head nfc-reveal">
			<span class="nfc-section__eyebrow">Как это работает</span>
			<h2 class="nfc-section__title">Слайд-шоу памяти по касанию</h2>
			<p class="nfc-section__sub">Родные подносят смартфон к NFC-табличке на памятнике — и открывается страница памяти. Без приложений, для всех современных телефонов.</p>
		</header>

		<div class="nfc-memorial__inner nfc-reveal">
			<ol class="nfc-memorial__steps">
				<li><span>1</span>Прислонили смартфон к табличке на памятнике</li>
				<li><span>2</span>Открывается мемориальная страница</li>
				<li><span>3</span>Фотографии разных лет, ФИО и даты, история жизни</li>
				<li><span>4</span>Видео и тёплые слова близких — можно дополнять всегда</li>
			</ol>

			<div class="nfc-memorial__phone" aria-hidden="true">
				<span class="nfc-memorial__island"></span>
				<div class="nfc-memorial__screen">
					<!-- 1. Портрет -->
					<div class="nfc-mem-slide nfc-mem-slide--1">
						<span class="nfc-mem__portrait"></span>
						<span class="nfc-mem__name">Иван Петрович</span>
						<span class="nfc-mem__cap">Светлая память</span>
					</div>
					<!-- 2. ФИО и даты -->
					<div class="nfc-mem-slide nfc-mem-slide--2">
						<span class="nfc-mem__fio">Смирнов<br>Иван Петрович</span>
						<span class="nfc-mem__dates">1947 — 2023</span>
						<span class="nfc-mem__rule"></span>
					</div>
					<!-- 3. Память -->
					<div class="nfc-mem-slide nfc-mem-slide--3">
						<span class="nfc-mem__quote">«Любящий муж, отец и дедушка. Навсегда в наших сердцах.»</span>
					</div>
					<!-- 4. Фотоальбом -->
					<div class="nfc-mem-slide nfc-mem-slide--4">
						<span class="nfc-mem__albumcap">Фотоальбом</span>
						<span class="nfc-mem__grid"><i></i><i></i><i></i><i></i><i></i><i></i></span>
					</div>
					<span class="nfc-mem__dots"><i></i><i></i><i></i><i></i></span>
				</div>
			</div>
		</div>
	</div>
</section>
