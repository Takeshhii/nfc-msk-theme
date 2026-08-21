<?php
/**
 * NFC MSK — низ страницы (общий для всех шаблонов).
 * Футер, wp_footer(), закрытие body.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-footer.php';
require get_stylesheet_directory() . '/inc/nfc-cookie.php';
wp_footer();
?>
</body>
</html>
