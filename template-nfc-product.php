<?php
/**
 * Template Name: NFC MSK — Товар
 *
 * Страница товара каталога. Данные (фото, цены, тексты) — в inc/nfc-catalog.php
 * (функция nfc_catalog_items), берутся по slug страницы.
 *
 * Применение: Страница → родитель «Каталог» → slug (vizitki, karty…) →
 * шаблон «NFC MSK — Товар». Фото — «Изображение записи» (необязательно).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
$nfc_group = 'product';
require get_stylesheet_directory() . '/inc/nfc-item-render.php';
require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php';
