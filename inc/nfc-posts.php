<?php
/**
 * NFC MSK — вывод списка записей блога с фильтром по категориям.
 * Используется в category.php (архив рубрики). Обложки — nfc_cover_url().
 *
 * @package nfc-msk
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nfc_cats = get_categories( array( 'hide_empty' => true ) );
?>
<div class="nfc-chips nfc-reveal" role="list">
	<a class="nfc-chip<?php echo is_home() ? ' is-active' : ''; ?>" role="listitem" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Все статьи</a>
	<?php foreach ( $nfc_cats as $nfc_c ) : ?>
		<a class="nfc-chip<?php echo ( is_category( $nfc_c->term_id ) ? ' is-active' : '' ); ?>" role="listitem" href="<?php echo esc_url( get_category_link( $nfc_c ) ); ?>">
			<?php echo esc_html( $nfc_c->name ); ?>
		</a>
	<?php endforeach; ?>
</div>

<?php if ( have_posts() ) : ?>
	<div class="nfc-grid nfc-grid--3" style="margin-top:38px">
		<?php while ( have_posts() ) : the_post(); ?>
			<a class="nfc-article nfc-reveal" href="<?php the_permalink(); ?>">
				<div class="nfc-article__media nfc-article__media--img">
					<img src="<?php echo esc_url( nfc_cover_url() ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
				</div>
				<div class="nfc-article__body">
					<span class="nfc-article__cat">
						<?php
						$nfc_pc = get_the_category();
						echo $nfc_pc ? esc_html( $nfc_pc[0]->name ) . ' · ' : '';
						echo esc_html( get_the_date() );
						?>
					</span>
					<h2 class="nfc-article__title"><?php the_title(); ?></h2>
					<p class="nfc-article__desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
				</div>
			</a>
		<?php endwhile; ?>
	</div>
	<?php
	the_posts_pagination(
		array(
			'mid_size'           => 2,
			'prev_text'          => '←',
			'next_text'          => '→',
			'screen_reader_text' => ' ',
		)
	);
	?>
<?php else : ?>
	<p class="nfc-section__sub" style="text-align:center">Статей пока нет. Добавьте их в админке: <strong>Записи → Добавить новую</strong>.</p>
<?php endif; ?>
