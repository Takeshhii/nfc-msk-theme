<?php
/**
 * Template Name: NFC MSK — Решение
 *
 * Страница готового решения. Данные — в inc/nfc-catalog.php
 * (функция nfc_solution_items), берутся по slug страницы.
 *
 * Применение: Страница → родитель «Решения» (resheniya-gotovye) → slug (otzyvy, menu…) →
 * шаблон «NFC MSK — Решение». Фото — «Изображение записи» (необязательно).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
$nfc_group = 'solution';
require get_stylesheet_directory() . '/inc/nfc-item-render.php';
require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php';
