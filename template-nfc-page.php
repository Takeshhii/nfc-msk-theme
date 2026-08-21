<?php
/**
 * Template Name: NFC MSK — HTML-страница
 *
 * Универсальный шаблон: выводит HTML, который вы вставили в редактор страницы
 * (вкладка «Код»), в нашем оформлении — с шапкой, футером, стилями и иконками.
 *
 * ВАЖНО:
 *  • Вставляйте код во вкладке «Код» (Text), НЕ переключайтесь на «Визуально» —
 *    визуальный редактор перепишет и сломает разметку.
 *  • Этот шаблон отключает авто-расстановку <p>/<br>, чтобы HTML не портился.
 *  • Иконки доступны по id: <svg class="nfc-ico"><use href="#ic-..."></use></svg>
 *    (полный список id — в inc/nfc-icons.php).
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Не превращать переносы строк в <p>/<br> — отдаём чистый HTML страницы.
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_content', 'shortcode_unautop' );

require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
?>

<main class="nfc-main" id="nfc-content">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
