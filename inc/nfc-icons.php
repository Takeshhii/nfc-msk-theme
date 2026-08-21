<?php
/**
 * NFC MSK — набор line-art иконок (SVG-спрайт).
 * Подключается один раз в начале страницы. В карточках используется так:
 *   <svg class="nfc-ico"><use href="#ic-vizitki"></use></svg>
 * Чтобы поменять иконку у карточки — просто впишите другой id (#ic-...).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
	<defs>
		<!-- Каталог -->
		<symbol id="ic-vizitki" viewBox="0 0 24 24"><rect x="2.5" y="5" width="19" height="14" rx="2"/><circle cx="8" cy="11" r="2"/><path d="M5.4 16c.4-1.5 1.4-2.2 2.6-2.2s2.2.7 2.6 2.2"/><path d="M14 10h5M14 13.5h5"/></symbol>
		<symbol id="ic-karty" viewBox="0 0 24 24"><rect x="2.5" y="5" width="19" height="14" rx="2"/><path d="M2.5 9.5h19"/><rect x="6" y="13" width="4.5" height="3" rx=".6"/></symbol>
		<symbol id="ic-stikery" viewBox="0 0 24 24"><path d="M5 4h8l6 6v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/><path d="M13 4v5a1 1 0 0 0 1 1h5"/></symbol>
		<symbol id="ic-metki" viewBox="0 0 24 24"><path d="M20.5 13.5l-7 7-10-10V3.5h7z"/><circle cx="7.5" cy="7.5" r="1.5"/></symbol>
		<symbol id="ic-breloki" viewBox="0 0 24 24"><circle cx="8" cy="8" r="4.2"/><path d="M11 11l8 8M16 16l2-2M18.5 18.5l1.7-1.7"/></symbol>
		<symbol id="ic-braslety" viewBox="0 0 24 24"><ellipse cx="12" cy="12" rx="8.5" ry="6.2"/><ellipse cx="12" cy="12" rx="4.6" ry="3.1"/></symbol>
		<symbol id="ic-bejdzhi" viewBox="0 0 24 24"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 3v3h6V3"/><circle cx="12" cy="11" r="2"/><path d="M8.5 17.2c.5-1.8 1.8-2.7 3.5-2.7s3 .9 3.5 2.7"/></symbol>
		<symbol id="ic-tablichki" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="11" rx="1.5"/><path d="M12 15v3.5M8 21h8"/></symbol>
		<symbol id="ic-pamyatniki" viewBox="0 0 24 24"><path d="M7 21V9a5 5 0 0 1 10 0v12z"/><path d="M4.5 21h15"/><path d="M12 8.5v4M10 10.5h4"/></symbol>
		<symbol id="ic-aksessuary" viewBox="0 0 24 24"><rect x="4" y="4" width="7" height="7" rx="1"/><rect x="13" y="4" width="7" height="7" rx="1"/><rect x="4" y="13" width="7" height="7" rx="1"/><rect x="13" y="13" width="7" height="7" rx="1"/></symbol>
		<symbol id="ic-na-zakaz" viewBox="0 0 24 24"><path d="M12 4l1.6 4.8L18 10l-4.4 1.2L12 16l-1.6-4.8L6 10l4.4-1.2z"/><path d="M18.5 14.5l.6 1.7 1.7.6-1.7.6-.6 1.7-.6-1.7-1.7-.6 1.7-.6z"/></symbol>

		<!-- Сферы -->
		<symbol id="ic-restoran" viewBox="0 0 24 24"><path d="M6 3v4M8 3v5M10 3v4M8 8v13"/><path d="M6 7h4"/><path d="M16 21v-9c2-1.5 2-7 0-9z"/></symbol>
		<symbol id="ic-salon" viewBox="0 0 24 24"><circle cx="6" cy="6" r="2.5"/><circle cx="6" cy="18" r="2.5"/><path d="M8 7.5L20 18M8 16.5L20 6"/></symbol>
		<symbol id="ic-stomatologiya" viewBox="0 0 24 24"><path d="M12 5c2-1.6 5-1.2 6 .8 1.2 2.4-.3 5-.7 7.4-.4 2.2-.6 5-1.8 5-1 0-1-2.5-1.5-4s-1-1.6-2 0-.5 4-1.5 4c-1.2 0-1.4-2.8-1.8-5C7.7 10.8 6.2 8.2 7.4 5.8c1-2 4-2.4 6-.8z"/></symbol>
		<symbol id="ic-otel" viewBox="0 0 24 24"><path d="M2.5 18V7"/><path d="M2.5 14h19v4"/><path d="M21.5 18v-4a3 3 0 0 0-3-3H10v3"/><circle cx="6.5" cy="11" r="1.6"/></symbol>
		<symbol id="ic-rieltor" viewBox="0 0 24 24"><path d="M4 11l8-6 8 6"/><path d="M6 10v9h12v-9"/><path d="M10 19v-5h4v5"/></symbol>
		<symbol id="ic-meropriyatiya" viewBox="0 0 24 24"><path d="M3 9V7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2a2 2 0 0 0 0 4v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-2a2 2 0 0 0 0-4z"/><path d="M14 6.5v11" stroke-dasharray="2 2.4"/></symbol>
		<symbol id="ic-ofis" viewBox="0 0 24 24"><rect x="5" y="3" width="14" height="18" rx="1"/><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"/><path d="M10 21v-3h4v3"/></symbol>
		<symbol id="ic-magazin" viewBox="0 0 24 24"><path d="M6 8h12l-1 12H7z"/><path d="M9 8V6a3 3 0 0 1 6 0v2"/></symbol>
		<symbol id="ic-avto" viewBox="0 0 24 24"><path d="M3 13l2-5a2 2 0 0 1 1.9-1.3h10.2A2 2 0 0 1 19 8l2 5v4h-2.2"/><path d="M3 17v-4h18"/><path d="M5.2 17H3"/><circle cx="7.5" cy="17" r="1.7"/><circle cx="16.5" cy="17" r="1.7"/></symbol>
		<symbol id="ic-fitnes" viewBox="0 0 24 24"><path d="M3 9v6M6 7v10M18 7v10M21 9v6M6 12h12"/></symbol>
		<symbol id="ic-obrazovanie" viewBox="0 0 24 24"><path d="M12 5L2 9l10 4 10-4z"/><path d="M6 11v4c0 1.1 2.7 2.5 6 2.5s6-1.4 6-2.5v-4"/><path d="M22 9v5"/></symbol>

		<!-- Готовые решения -->
		<symbol id="ic-otzyvy" viewBox="0 0 24 24"><path d="M12 3.5l2.6 5.3 5.9.9-4.3 4.1 1 5.8-5.2-2.7-5.2 2.7 1-5.8L3.5 9.7l5.9-.9z"/></symbol>
		<symbol id="ic-menu" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h10M4 18h10"/></symbol>
		<symbol id="ic-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.6"/><path d="M5 20c.8-3.8 3.5-5.6 7-5.6s6.2 1.8 7 5.6"/></symbol>
		<symbol id="ic-wifi" viewBox="0 0 24 24"><path d="M5 10.5a11 11 0 0 1 14 0M7.5 13.5a7 7 0 0 1 9 0M10 16.5a3 3 0 0 1 4 0"/><circle cx="12" cy="19.4" r=".7"/></symbol>
		<symbol id="ic-chaevye" viewBox="0 0 24 24"><ellipse cx="9" cy="7" rx="5" ry="2.5"/><path d="M4 7v4c0 1.4 2.2 2.5 5 2.5"/><ellipse cx="15" cy="13" rx="5" ry="2.5"/><path d="M10 13.2v4c0 1.4 2.2 2.5 5 2.5s5-1.1 5-2.5v-4"/></symbol>
		<symbol id="ic-loyalnost" viewBox="0 0 24 24"><rect x="3.5" y="9" width="17" height="5" rx="1"/><path d="M5 14v6.5h14V14"/><path d="M12 9v11.5"/><path d="M12 9S11 4 8.5 4 6.5 8.5 9 9zM12 9s1-5 3.5-5 2 4.5-.5 5z"/></symbol>
		<symbol id="ic-dostup" viewBox="0 0 24 24"><rect x="5" y="10.5" width="14" height="10" rx="2"/><path d="M8 10.5V7a4 4 0 0 1 8 0v3.5"/><circle cx="12" cy="15" r="1.3"/><path d="M12 16.2v2"/></symbol>
		<symbol id="ic-drugoe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M12 8.4v7.2M8.4 12h7.2"/></symbol>

		<!-- Блог -->
		<symbol id="ic-book" viewBox="0 0 24 24"><path d="M12 6.5C10.5 5 8 4.5 5 4.5V18c3 0 5.5.5 7 2 1.5-1.5 4-2 7-2V4.5c-3 0-5.5.5-7 2z"/><path d="M12 6.5V20"/></symbol>
		<symbol id="ic-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 2.5v3M12 18.5v3M4.6 4.6l2.1 2.1M17.3 17.3l2.1 2.1M2.5 12h3M18.5 12h3M4.6 19.4l2.1-2.1M17.3 6.7l2.1-2.1"/></symbol>
		<symbol id="ic-compare" viewBox="0 0 24 24"><path d="M7 4v16M7 4L3.5 7.5M7 4l3.5 3.5"/><path d="M17 20V4M17 20l3.5-3.5M17 20l-3.5-3.5"/></symbol>
		<symbol id="ic-pencil" viewBox="0 0 24 24"><path d="M4 20l1.2-4L16 5.2 18.8 8 8 18.8z"/><path d="M14 7.2L16.8 10"/></symbol>

		<!-- Преимущества -->
		<symbol id="ic-factory" viewBox="0 0 24 24"><path d="M3 21V11l5 3V11l5 3V8l6 3v10z"/><path d="M3 21h18"/></symbol>
		<symbol id="ic-refresh" viewBox="0 0 24 24"><path d="M20 11a8 8 0 0 0-13.7-4.6L4 9"/><path d="M4 4v5h5"/><path d="M4 13a8 8 0 0 0 13.7 4.6L20 15"/><path d="M20 20v-5h-5"/></symbol>
		<symbol id="ic-bolt" viewBox="0 0 24 24"><path d="M13 3L5 13h6l-1 8 8-10h-6z"/></symbol>
		<symbol id="ic-gem" viewBox="0 0 24 24"><path d="M6 4h12l3 5-9 11L3 9z"/><path d="M3 9h18M9 4l-1.5 5L12 20M15 4l1.5 5L12 20"/></symbol>
		<symbol id="ic-shield" viewBox="0 0 24 24"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/><path d="M9 12l2 2 4-4"/></symbol>
		<symbol id="ic-support" viewBox="0 0 24 24"><path d="M20 14a2 2 0 0 1-2 2H8l-4 4V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2z"/><path d="M8 9h8M8 12.5h5"/></symbol>
		<symbol id="ic-telegram" viewBox="0 0 24 24"><path d="M21.5 4.5 2.8 11.3c-.9.35-.9.9-.15 1.13l4.6 1.44 1.77 5.4c.24.63.13.88.8.88.5 0 .72-.23 1-.5l2.2-2.14 4.6 3.4c.85.47 1.4.23 1.6-.78l2.9-13.6c.3-1.25-.5-1.8-1.32-1.43z"/><path d="M7.4 13.6 16.8 7.7 9.2 15z" fill="currentColor" stroke="none"/></symbol>
	</defs>
</svg>
