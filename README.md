# NFC MSK — WordPress Theme

`PHP` `WordPress` `vanilla CSS/JS` — no parent theme, no page builder, no JS libraries

This runs [nfc-msk.ru](https://nfc-msk.ru), my NFC-products business in Moscow —
cards, tags, stickers, keychains, bracelets, badges, plates. The site used to run
on a purchased theme (Impreza) and it was heavier than it needed to be, and I kept
hitting its limits whenever I wanted to control something for SEO. So I rebuilt
the theme from scratch: standalone, no parent theme dependency, no page builder,
and simple enough that I can edit a product page's copy by just typing HTML into
a template instead of fighting a builder UI.

## Stack

Pure PHP, my own template system, no Impreza underneath anymore. CSS and JS are
both hand-written (`assets/css/nfc-main.css` with an `.nfc-*` prefix and design
tokens up top, `assets/js/nfc-main.js` for the menu/FAQ/sticky header/scroll
reveal) — zero third-party frontend libraries. Icons and the logo are my own
line-art SVGs. Fonts are Cormorant Garamond for headings and Nunito Sans for
body text.

## How it's structured

```
inc/nfc-shell-top.php / nfc-shell-bottom.php   shared <head> / header / footer
template-nfc-{home,blog,about,help,article,page}.php   one template per page type
page.php / single.php / category.php / index.php / 404.php   WP fallbacks
inc/nfc-catalog.php                             the product & solution catalog
inc/nfc-header.php / nfc-footer.php             mega-menu, footer columns, SEO links
inc/nfc-logos-marquee.php                       client-logo strip (light/dark tile logic)
```

Product and page content is plain HTML written directly inside the templates —
on purpose, not PHP arrays and not shortcodes. I wanted to be able to edit a
product description without touching any logic.

## The SEO parts I actually built this for

- **301 redirects** for legacy URLs (`nfc_legacy_redirects()` in `functions.php`)
  — collapses old duplicate paths into the canonical ones, e.g.
  `/nfc-vizitki/` → `/vizitki/`.
- Blog pagination (`/blog/page/N/`) is deliberately `noindex`'d — articles are
  still fully discoverable through the sitemap and the "related articles"
  blocks, so nothing falls out of the index, it's just not competing with the
  real article pages.
- Every product/solution page follows the same pattern: shared blocks + FAQ +
  price table + gallery + a collapsible long-form SEO text block at the bottom.

## Working notes

I bump the theme version on every build (top of `style.css`) — matters because
the host runs a page-cache/minify plugin that doesn't cache-bust automatically,
so after deploying I still have to go clear it manually or the old CSS sticks
around. No build step otherwise: edit the PHP/CSS/JS directly, zip the folder,
upload via wp-admin or FTP into `wp-content/themes/nfc-msk/`.

---

## Русская версия

Это тема, на которой работает [nfc-msk.ru](https://nfc-msk.ru) — мой бизнес по
NFC-товарам в Москве (визитки, карты, метки, стикеры, брелоки, браслеты,
бейджи, таблички). Раньше сайт стоял на купленной теме Impreza, она была
тяжелее, чем нужно, и я постоянно упирался в её ограничения, когда хотел
что-то контролировать под SEO. Поэтому пересобрал тему с нуля: самостоятельная,
без родительской темы, без конструктора страниц, и достаточно простая, чтобы
редактировать текст товарной карточки просто HTML в шаблоне, а не воевать с
билдером.

**Стек:** чистый PHP, своя система шаблонов, никакого Impreza под капотом.
CSS и JS написаны руками (`assets/css/nfc-main.css` с префиксом `.nfc-*`,
`assets/js/nfc-main.js` — меню, FAQ, sticky-шапка, появление при скролле), без
сторонних библиотек. Иконки и логотип — свои line-art SVG. Шрифты: Cormorant
Garamond (заголовки) + Nunito Sans (текст).

**Архитектура:** общий верх/низ страницы (`inc/nfc-shell-*`), отдельный шаблон
под каждый тип страницы, каталог товаров и решений в `inc/nfc-catalog.php`.
Контент товаров и страниц — обычный HTML прямо в шаблонах, специально не
PHP-массивы и не шорткоды, чтобы можно было поправить текст без касания логики.

**SEO, ради чего всё это и затевалось:** 301-редиректы старых URL на
канонические, `noindex` для пагинации блога (статьи всё равно доступны через
карту сайта и «читайте также» — из индекса ничего не выпадает), у каждой
товарной страницы — FAQ, цены, галерея и сворачиваемый SEO-текст.

**Рабочий процесс:** версию темы поднимаю при каждой сборке — на хостинге стоит
плагин кэша/минификации, который сам не сбрасывает кэш, так что после заливки
всё равно захожу и чищу его руками, иначе видны старые стили. Сборки как
таковой нет: правлю PHP/CSS/JS напрямую, архивирую папку темы, заливаю через
wp-admin или FTP в `wp-content/themes/nfc-msk/`.
