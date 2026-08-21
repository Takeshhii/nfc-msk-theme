<?php
/**
 * NFC MSK — верх страницы (общий для всех шаблонов).
 * <head>, открытие body, skip-ссылка, SVG-спрайт, шапка с mega-menu.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'nfc-page' ); ?>>
<?php wp_body_open(); ?>
<a class="nfc-skip" href="#nfc-content">Перейти к содержимому</a>
<?php
require get_stylesheet_directory() . '/inc/nfc-icons.php';
require get_stylesheet_directory() . '/inc/nfc-header.php';
