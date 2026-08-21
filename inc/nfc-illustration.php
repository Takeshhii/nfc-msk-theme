<?php
/**
 * NFC MSK — фирменная векторная иллюстрация «устройство NFC-метки»:
 * карта с чипом, рамочной антенной-катушкой и контактными волнами.
 * Заменяет фотографию там, где её нет. Emerald & Gold, чистый SVG.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<svg class="nfc-illus" viewBox="0 0 320 240" role="img" aria-label="Устройство NFC-метки: чип и антенна">
	<defs>
		<linearGradient id="nfcIllusCard" x1="0" y1="0" x2="1" y2="1">
			<stop offset="0" stop-color="#1c3729"/><stop offset="1" stop-color="#12241a"/>
		</linearGradient>
		<linearGradient id="nfcIllusGold" x1="0" y1="0" x2="1" y2="1">
			<stop offset="0" stop-color="#e6cd87"/><stop offset="1" stop-color="#c2a14e"/>
		</linearGradient>
	</defs>
	<!-- корпус карты -->
	<rect x="34" y="46" width="212" height="150" rx="16" fill="url(#nfcIllusCard)" stroke="#c2a14e" stroke-opacity=".5"/>
	<!-- рамочная антенна (катушка) -->
	<g fill="none" stroke="url(#nfcIllusGold)" stroke-width="2.4" stroke-linejoin="round">
		<rect x="52" y="64" width="176" height="114" rx="12"/>
		<rect x="62" y="74" width="156" height="94" rx="10"/>
		<rect x="72" y="84" width="136" height="74" rx="8"/>
	</g>
	<!-- чип -->
	<rect x="92" y="100" width="46" height="40" rx="6" fill="url(#nfcIllusGold)"/>
	<g stroke="#12241a" stroke-width="1.6" stroke-opacity=".6">
		<line x1="92" y1="112" x2="138" y2="112"/><line x1="92" y1="128" x2="138" y2="128"/>
		<line x1="106" y1="100" x2="106" y2="140"/><line x1="124" y1="100" x2="124" y2="140"/>
	</g>
	<!-- контактные волны -->
	<g fill="none" stroke="url(#nfcIllusGold)" stroke-width="3" stroke-linecap="round">
		<path d="M266 92a44 44 0 0 1 0 56"/>
		<path d="M280 78a66 66 0 0 1 0 84"/>
		<path d="M294 64a88 88 0 0 1 0 112"/>
	</g>
	<!-- искра касания -->
	<circle cx="252" cy="120" r="5" fill="#e6cd87"/>
</svg>
