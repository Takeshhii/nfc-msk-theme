<?php
/**
 * NFC MSK — functions.php (самостоятельная тема).
 *
 * Контент страниц — обычный HTML в шаблонах template-nfc-*.php или прямо в
 * редакторе страницы (шаблон «NFC MSK — HTML-страница»). Стили — assets/css.
 *
 * @package nfc-msk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Базовая поддержка темы.
 */
function nfc_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'nfc_theme_setup' );

/**
 * Данные страниц товаров и решений (фото, цены, тексты).
 */
require_once get_stylesheet_directory() . '/inc/nfc-catalog.php';
require_once get_stylesheet_directory() . '/inc/nfc-seo-texts.php';

/**
 * Контакты бренда (меняются в одном месте).
 */
function nfc_phone_display() { return '+7 (962) 880-07-15'; }
function nfc_phone_href() { return '+79628800715'; }
function nfc_email() { return 'nfc.v.msk@mail.ru'; }

/**
 * URL обложки: изображение записи или дефолтная шаблонная обложка темы.
 */
function nfc_cover_url( $post_id = null ) {
	if ( has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail_url( $post_id, 'large' );
	}
	return get_stylesheet_directory_uri() . '/assets/img/nfc-cover.svg';
}

/**
 * Стили, шрифты и скрипты — на всём сайте (тема самостоятельная).
 */
function nfc_enqueue_assets() {
	$base    = get_stylesheet_directory_uri();
	$version = wp_get_theme()->get( 'Version' );

	// Единый шрифт сайта — Manrope (заголовки и текст).
	// Хотите сайт без внешних запросов — удалите эту строку, останется системный sans-serif.
	wp_enqueue_style(
		'nfc-fonts',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'nfc-main', $base . '/assets/css/nfc-main.css', array( 'nfc-fonts' ), $version );
	wp_enqueue_script( 'nfc-main', $base . '/assets/js/nfc-main.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'nfc_enqueue_assets' );

/* =========================================================================
   Реквизиты компании для микроразметки (Schema.org).
   ★ ЗАПОЛНИТЕ реальными данными — пустые значения в разметку не попадают.
   ========================================================================= */
function nfc_inn()  { return ''; } // ИНН — впишите цифры, напр. '7701234567'
function nfc_ogrn() { return ''; } // ОГРН/ОГРНИП — впишите цифры

/** Часы работы: Пн–Пт 10:00–18:00, Сб–Вс выходной. Пусто array() — не выводить. */
function nfc_hours_spec() {
	return array(
		array( '@type' => 'OpeningHoursSpecification', 'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ), 'opens' => '10:00', 'closes' => '18:00' ),
	);
}

/** Материал носителя для Product-разметки (по slug товара). */
function nfc_product_material( $slug ) {
	$map = array(
		'vizitki'   => 'ПВХ-пластик',
		'karty'     => 'ПВХ-пластик',
		'stikery'   => 'Винил (самоклеящаяся плёнка)',
		'breloki'   => 'Эпоксидная смола / металл',
		'braslety'  => 'Силикон',
		'bejdzhi'   => 'ПВХ-пластик',
		'tablichki' => 'Акрил / металл',
		'pamyatniki' => 'Металл с гравировкой',
	);
	return isset( $map[ $slug ] ) ? $map[ $slug ] : '';
}

/** Узел Organization + LocalBusiness (общий, @id на всех страницах один). */
function nfc_business_node() {
	$base = get_stylesheet_directory_uri() . '/assets/img/';
	$node = array(
		'@type'       => array( 'Organization', 'LocalBusiness' ),
		'@id'         => home_url( '/#business' ),
		'name'        => 'NFC MSK',
		'url'         => home_url( '/' ),
		'description' => 'Изготовление и производство NFC в Москве: визитки, карты, метки, стикеры, брелоки, браслеты, бейджи и таблички.',
		'telephone'   => nfc_phone_href(),
		'email'       => nfc_email(),
		'areaServed'  => 'Москва',
		'image'       => $base . 'favicon-nfc.png',
		'logo'        => $base . 'logo-nfc-msk.png',
		'address'     => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => 'Москва',
			'addressRegion'   => 'Москва',
			'addressCountry'  => 'RU',
		),
		'sameAs'      => array( 'https://t.me/nfc_msk' ),
	);
	$hours = nfc_hours_spec();
	if ( ! empty( $hours ) ) {
		$node['openingHoursSpecification'] = $hours;
	}
	$ids = array();
	if ( nfc_inn() )  { $ids[] = array( '@type' => 'PropertyValue', 'name' => 'ИНН', 'value' => nfc_inn() ); }
	if ( nfc_ogrn() ) { $ids[] = array( '@type' => 'PropertyValue', 'name' => 'ОГРН', 'value' => nfc_ogrn() ); }
	if ( $ids ) {
		$node['identifier'] = $ids;
		if ( nfc_inn() ) { $node['taxID'] = nfc_inn(); }
	}
	return $node;
}

/** Узел Product для страницы товара (данные из nfc-catalog.php). */
function nfc_product_node( $slug, $d ) {
	$url  = home_url( nfc_product_url( $slug ) );
	$desc = ! empty( $d['intro'] ) ? $d['intro'] : ( ! empty( $d['subtitle'] ) ? $d['subtitle'] : $d['title'] );
	$node = array(
		'@type'       => 'Product',
		'@id'         => $url . '#product',
		'name'        => $d['title'] . ' в Москве',
		'description' => $desc,
		'brand'       => array( '@type' => 'Brand', 'name' => 'NFC MSK' ),
		'category'    => 'NFC',
		'url'         => $url,
	);
	if ( has_post_thumbnail() ) {
		$node['image'] = get_the_post_thumbnail_url( null, 'large' );
	} elseif ( ! empty( $d['image'] ) ) {
		$node['image'] = $d['image'];
	}
	$mat = nfc_product_material( $slug );
	if ( $mat ) {
		$node['material'] = $mat;
	}
	if ( ! empty( $d['tiers'] ) ) {
		$prices = array_values( $d['tiers'] );
		$node['offers'] = array(
			'@type'         => 'AggregateOffer',
			'priceCurrency' => 'RUB',
			'lowPrice'      => (string) min( $prices ),
			'highPrice'     => (string) max( $prices ),
			'offerCount'    => count( $prices ),
			'availability'  => 'https://schema.org/InStock',
			'url'           => $url,
			'seller'        => array( '@id' => home_url( '/#business' ) ),
		);
	}
	return $node;
}

/**
 * Навигационная цепочка (для BreadcrumbList и, при желании, вывода в шаблоне).
 * Возвращает массив звеньев array( 'name' => ..., 'url' => ... ) от «Главной»
 * до текущей страницы. Логика повторяет видимые хлебные крошки.
 */
function nfc_breadcrumb_trail() {
	$trail = array( array( 'name' => 'Главная', 'url' => home_url( '/' ) ) );

	if ( is_singular() ) {
		$pid   = get_queried_object_id();
		$slug  = get_post_field( 'post_name', $pid );
		$items = nfc_catalog_items();
		if ( isset( $items[ $slug ] ) ) {
			$trail[] = array( 'name' => 'Каталог', 'url' => home_url( '/catalog/' ) );
		} elseif ( 0 === strpos( (string) $slug, 'resheniya-gotovye-' ) ) {
			$trail[] = array( 'name' => 'Решения', 'url' => home_url( '/vse-resheniya/' ) );
		} elseif ( is_singular( 'post' ) ) {
			$trail[] = array( 'name' => 'Блог', 'url' => home_url( '/blog/' ) );
		}
		$trail[] = array( 'name' => get_the_title( $pid ), 'url' => get_permalink( $pid ) );
	} elseif ( is_category() ) {
		$cat     = get_queried_object();
		$trail[] = array( 'name' => 'Блог', 'url' => home_url( '/blog/' ) );
		$trail[] = array( 'name' => single_cat_title( '', false ), 'url' => get_category_link( $cat ) );
	} elseif ( is_home() && ! is_front_page() ) {
		$trail[] = array( 'name' => 'Блог', 'url' => home_url( '/blog/' ) );
	}

	return $trail;
}

/**
 * Фавикон + микроразметка Schema.org (@graph) на всех страницах.
 * Meta description / Open Graph выводит Yoast SEO — тема их не дублирует.
 *
 * ⚠ Yoast сам выводит Organization / WebSite / WebPage / Article. Чтобы не было
 * дублей в разметке, есть переключатель: добавьте в wp-config.php строку
 *   define( 'NFC_DEFER_TO_YOAST_SCHEMA', true );
 * — тогда тема отдаст Yoast общие узлы и добавит только то, чего у Yoast нет:
 * LocalBusiness (реквизиты, часы, гео), Product и FAQPage.
 * Либо, наоборот, отключите схему в Yoast и оставьте авторитетным источником тему.
 */
function nfc_seo_head() {
	if ( is_admin() ) {
		return;
	}
	// Фавикон — золотая эмблема NFC MSK (PNG, прозрачный фон); SVG-знак запасной.
	$nfc_ico = get_stylesheet_directory_uri() . '/assets/img/';
	echo '<link rel="icon" type="image/png" sizes="512x512" href="' . esc_url( $nfc_ico . 'favicon-nfc.png' ) . '">' . "\n";
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $nfc_ico . 'favicon-180.png' ) . '">' . "\n";
	echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( get_stylesheet_directory_uri() . '/favicon.svg' ) . '">' . "\n";

	$defer = defined( 'NFC_DEFER_TO_YOAST_SCHEMA' ) && NFC_DEFER_TO_YOAST_SCHEMA;

	// LocalBusiness выводим всегда (у Yoast free его нет — это ключевые реквизиты).
	$graph = array( nfc_business_node() );

	// WebSite + BreadcrumbList — только если не отдаём их Yoast (у Yoast они свои).
	$breadcrumb_id = '';
	if ( ! $defer ) {
		$graph[] = array(
			'@type'      => 'WebSite',
			'@id'        => home_url( '/#website' ),
			'url'        => home_url( '/' ),
			'name'       => 'NFC MSK',
			'inLanguage' => 'ru-RU',
			'publisher'  => array( '@id' => home_url( '/#business' ) ),
		);

		// Навигационная цепочка (сниппет Яндекса/Google).
		$trail = nfc_breadcrumb_trail();
		if ( count( $trail ) > 1 ) {
			$last          = end( $trail );
			$breadcrumb_id = $last['url'] . '#breadcrumb';
			$elements      = array();
			foreach ( $trail as $i => $crumb ) {
				$elements[] = array(
					'@type'    => 'ListItem',
					'position' => $i + 1,
					'name'     => $crumb['name'],
					'item'     => $crumb['url'],
				);
			}
			$graph[] = array(
				'@type'           => 'BreadcrumbList',
				'@id'             => $breadcrumb_id,
				'itemListElement' => $elements,
			);
		}
	}

	if ( is_singular() ) {
		$pid = get_queried_object_id();
		$url = get_permalink( $pid );

		// WebPage + даты публикации/обновления — только если не отдаём Yoast.
		if ( ! $defer ) {
			$webpage = array(
				'@type'         => 'WebPage',
				'@id'           => $url . '#webpage',
				'url'           => $url,
				'name'          => get_the_title( $pid ),
				'inLanguage'    => 'ru-RU',
				'isPartOf'      => array( '@id' => home_url( '/#website' ) ),
				'about'         => array( '@id' => home_url( '/#business' ) ),
				'datePublished' => get_the_date( 'c', $pid ),
				'dateModified'  => get_the_modified_date( 'c', $pid ),
			);
			if ( $breadcrumb_id ) {
				$webpage['breadcrumb'] = array( '@id' => $breadcrumb_id );
			}
			$graph[] = $webpage;
		}

		// Product — на страницах товаров (slug совпадает с ключом каталога). Всегда.
		$slug  = get_post_field( 'post_name', $pid );
		$items = nfc_catalog_items();
		if ( isset( $items[ $slug ] ) ) {
			$graph[] = nfc_product_node( $slug, $items[ $slug ] );
		}

		// Article — на записях блога, только если не отдаём Yoast.
		if ( ! $defer && is_singular( 'post' ) ) {
			$article = array(
				'@type'            => 'Article',
				'headline'         => get_the_title( $pid ),
				'inLanguage'       => 'ru-RU',
				'datePublished'    => get_the_date( 'c', $pid ),
				'dateModified'     => get_the_modified_date( 'c', $pid ),
				'author'           => array( '@id' => home_url( '/#business' ) ),
				'publisher'        => array( '@id' => home_url( '/#business' ) ),
				'mainEntityOfPage' => array( '@id' => $url . '#webpage' ),
			);
			if ( has_post_thumbnail( $pid ) ) {
				$article['image'] = get_the_post_thumbnail_url( $pid, 'large' );
			}
			$graph[] = $article;
		}
	}

	$ld = array( '@context' => 'https://schema.org', '@graph' => $graph );
	echo '<script type="application/ld+json">' . wp_json_encode( $ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'nfc_seo_head', 5 );

/* =========================================================================
   FAQ: единый рендер аккордеона + сбор пунктов для FAQPage JSON-LD.
   Вызов в шаблоне:  nfc_faq( array( 'Вопрос?' => '<p>Ответ.</p>', ... ) );
   Разметка FAQPage гарантированно совпадает с видимым текстом.
   ========================================================================= */
global $nfc_faq_collected;
$nfc_faq_collected = array();

function nfc_faq( $items ) {
	global $nfc_faq_collected;
	echo '<div class="nfc-faq">';
	foreach ( $items as $question => $answer ) {
		$nfc_faq_collected[ $question ] = $answer;
		printf(
			'<div class="nfc-faq__item nfc-reveal"><button class="nfc-faq__q" aria-expanded="false"><span>%s</span><span class="nfc-faq__sign" aria-hidden="true">+</span></button><div class="nfc-faq__a"><div>%s</div></div></div>',
			esc_html( $question ),
			wp_kses_post( $answer )
		);
	}
	echo '</div>';
}

function nfc_faq_schema() {
	global $nfc_faq_collected;
	if ( empty( $nfc_faq_collected ) ) {
		return;
	}
	$questions = array();
	foreach ( $nfc_faq_collected as $q => $a ) {
		$questions[] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $q ),
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => trim( wp_strip_all_tags( $a ) ),
			),
		);
	}
	$ld = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $questions );
	echo '<script type="application/ld+json">' . wp_json_encode( $ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_footer', 'nfc_faq_schema' );

/**
 * 301-редиректы со старых удалённых URL (были в индексе, отдавали 404).
 * Ведём на самую близкую существующую страницу — чтобы не терять вес ссылок
 * и убрать 404 из поиска. Добавляйте новые пары по мере необходимости.
 */
function nfc_legacy_redirects() {
	if ( is_admin() ) {
		return;
	}
	$path = isset( $_SERVER['REQUEST_URI'] ) ? trim( (string) wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ), '/' ) : '';
	if ( '' === $path ) {
		return;
	}
	// Точные старые адреса → канонические. Работает и для 404, и для старых
	// дублей-страниц (отдавали 200, Non-Indexable) — консолидируем вес.
	$map = array(
		// были 404
		'nfc-dlya-oteley'       => '/blog/nfc-dlya-otelej-otzyvy-wi-fi-karty-gostej-i-czifrovoj-servis/',
		'nfc-dlya-meropriyatiy' => '/blog/nfc-dlya-vystavok-vizitki-bejdzhi-i-sbor-kontaktov-po-kasaniyu/',
		'nfc-wifi'              => '/resheniya-gotovye-wi-fi/',
		'nfc-dlya-stomatologiy' => '/blog/nfc-dlya-stomatologij-otzyvy-zapis-i-udobnyj-servis-dlya-paczientov/',
		// старые дубли товаров/решений (nfc-… → канонический /…/)
		'nfc-vizitki'           => '/vizitki/',
		'nfc-karty'             => '/karty/',
		'nfc-stikery'           => '/stikery/',
		'nfc-metki'             => '/stikery/',
		'nfc-breloki'           => '/breloki/',
		'nfc-menyu'             => '/resheniya-gotovye-menu/',
		'nfc-dlya-otzyvov'      => '/resheniya-gotovye-otzyvy/',
		'nfc-dlya-oplaty'       => '/resheniya-gotovye-chayevye/',
	);
	if ( isset( $map[ $path ] ) ) {
		wp_safe_redirect( home_url( $map[ $path ] ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'nfc_legacy_redirects' );

/**
 * Уникальный <title> для страниц пагинации (/blog/page/2/ и архивов рубрик),
 * чтобы заголовки не дублировались. Работает и без Yoast; с Yoast он сам
 * добавит номер страницы, тогда этот фильтр просто не понадобится.
 */
function nfc_paged_title( $parts ) {
	$paged = max( (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
	if ( $paged > 1 && ! empty( $parts['title'] ) ) {
		$parts['title'] .= ' — страница ' . $paged;
	}
	return $parts;
}
add_filter( 'document_title_parts', 'nfc_paged_title' );

/**
 * rel="prev"/rel="next" на страницах пагинации — сигнал связки для Яндекса,
 * чтобы страницы /blog/page/N/ не считались дублями, а серией. Индексацию не ломает.
 */
function nfc_rel_prev_next() {
	if ( is_singular() ) {
		return;
	}
	global $wp_query;
	$paged = max( (int) get_query_var( 'paged' ), 1 );
	$max   = isset( $wp_query->max_num_pages ) ? (int) $wp_query->max_num_pages : 0;
	if ( $max <= 1 ) {
		return;
	}
	if ( $paged > 1 ) {
		echo '<link rel="prev" href="' . esc_url( get_pagenum_link( $paged - 1 ) ) . '">' . "\n";
	}
	if ( $paged < $max ) {
		echo '<link rel="next" href="' . esc_url( get_pagenum_link( $paged + 1 ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'nfc_rel_prev_next', 6 );

/** Дата последнего обновления текущей страницы, формат ДД.ММ.ГГГГ (пусто вне singular). */
function nfc_updated_date() {
	if ( ! is_singular() ) {
		return '';
	}
	return get_the_modified_date( 'd.m.Y', get_queried_object_id() );
}
