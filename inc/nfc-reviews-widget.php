<?php
/**
 * NFC MSK — блок «Отзывы на Яндексе».
 * Официальный виджет отзывов Яндекс Карт для организации 92956608141,
 * оформлённый под стилистику сайта (белая карточка в золотой рамке).
 * Профиль: https://yandex.ru/profile/92956608141
 *
 * Подключается точечно на нужных страницах:
 *   require get_stylesheet_directory() . '/inc/nfc-reviews-widget.php';
 * Секцию можно чередовать по фону — передайте до require:
 *   $nfc_ya_alt = true;  // тёмная секция (nfc-section--alt)
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$nfc_ya_org = '92956608141';
$nfc_ya_alt = ! empty( $nfc_ya_alt );
?>
<section class="nfc-section nfc-yareviews<?php echo $nfc_ya_alt ? ' nfc-section--alt' : ''; ?>">
	<div class="nfc-container nfc-container--narrow">
		<header class="nfc-section__head nfc-reveal">
			<span class="nfc-section__eyebrow">Отзывы</span>
			<h2 class="nfc-section__title">Отзывы клиентов на Яндексе</h2>
			<p class="nfc-section__sub">Настоящие отзывы о работе NFC MSK — прямо с Яндекс&nbsp;Карт.</p>
		</header>
		<div class="nfc-yareviews__frame nfc-reveal">
			<iframe class="nfc-yareviews__iframe" src="https://yandex.ru/maps-reviews-widget/<?php echo esc_attr( $nfc_ya_org ); ?>?comments" title="Отзывы о NFC MSK на Яндекс Картах" loading="lazy"></iframe>
		</div>
		<div class="nfc-section__more nfc-reveal">
			<a class="nfc-btn nfc-btn--ghost" href="https://yandex.ru/profile/<?php echo esc_attr( $nfc_ya_org ); ?>" target="_blank" rel="noopener">Все отзывы на Яндексе</a>
		</div>
	</div>
</section>
<?php
// Сбрасываем флаг, чтобы следующее подключение по умолчанию было светлым.
$nfc_ya_alt = false;
