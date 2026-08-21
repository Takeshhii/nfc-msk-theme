<?php
/**
 * Шаблон 404 — страница не найдена.
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require get_stylesheet_directory() . '/inc/nfc-shell-top.php';
?>

<main class="nfc-main" id="nfc-content">
	<section class="nfc-pagehero" style="padding:120px 0 100px">
		<div class="nfc-container nfc-container--narrow">
			<span class="nfc-pagehero__eyebrow">Ошибка 404</span>
			<h1 class="nfc-pagehero__title">Страница не найдена</h1>
			<p class="nfc-pagehero__sub">Возможно, страница перемещена или ещё не создана. Вернитесь на главную или загляните в каталог.</p>
			<div class="nfc-hero__actions" style="margin-top:32px">
				<a class="nfc-btn nfc-btn--primary nfc-btn--lg" href="<?php echo esc_url( home_url( '/' ) ); ?>">На главную</a>
				<a class="nfc-btn nfc-btn--ghost nfc-btn--lg" href="<?php echo esc_url( home_url( '/catalog/' ) ); ?>">В каталог</a>
			</div>
		</div>
	</section>
</main>

<?php require get_stylesheet_directory() . '/inc/nfc-shell-bottom.php'; ?>
