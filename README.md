# NFC MSK — WordPress Theme

![PHP](https://img.shields.io/badge/PHP-WordPress%20theme-777BB4?logo=php&logoColor=white)
![No JS frameworks](https://img.shields.io/badge/JS-vanilla%2C%20no%20libraries-F7DF1E)
![Standalone](https://img.shields.io/badge/dependencies-standalone%2C%20no%20parent%20theme-2ea44f)
![Style](https://img.shields.io/badge/style-Emerald%20%26%20Gold-0B6E4F)

**Task:** [nfc-msk.ru](https://nfc-msk.ru) — an NFC-products business (cards, tags,
stickers, keychains, bracelets, badges, plates) in Moscow — was running on a
purchased theme (Impreza) that was heavier than the site needed and hard to fully
control for SEO. It needed a from-scratch, self-contained theme: fast, easy to hand-edit
per product page, and structured to avoid duplicate-content SEO issues.

**Result:** a standalone WordPress theme (no parent theme, no page builder, no
third-party JS libraries) with its own template system, a full catalog of NFC
product/solution pages, an "Emerald & Gold" premium visual identity, and built-in
SEO plumbing (legacy URL redirects, canonical pagination, sitemap) that a
non-developer can extend by editing plain HTML inside the templates.

---

## Stack

- **Pure PHP** WordPress theme — no parent theme (Impreza was removed), no
  page-builder dependency
- **Vanilla CSS** (`assets/css/nfc-main.css`, `.nfc-*` class prefix, design tokens
  in `:root`) and **vanilla JS** (`assets/js/nfc-main.js` — menu, FAQ accordion,
  sticky header, scroll reveal) — zero third-party frontend libraries
- Line-art **SVG icon/logo system** (`inc/nfc-icons.php`, `inc/nfc-logo.php`)
- Fonts: Cormorant Garamond (headings) + Nunito Sans (body)

## Architecture

```
inc/nfc-shell-top.php / nfc-shell-bottom.php   shared <head> / header / footer shell
template-nfc-{home,blog,about,help,article,page}.php   page-type templates
page.php / single.php / category.php / index.php / 404.php   WordPress fallbacks
inc/nfc-catalog.php                             product & solution catalog data
inc/nfc-header.php / nfc-footer.php             mega-menu, footer columns, SEO links
inc/nfc-logos-marquee.php                       client-logo marquee (light/dark tile logic)
```

Product and page content is written as **plain HTML inside the templates** —
deliberately not PHP arrays or shortcodes, so a non-developer can edit copy directly
without touching logic.

## SEO features

- **301 redirects** for legacy URLs (`nfc_legacy_redirects()` in `functions.php`) —
  collapses old duplicate paths (e.g. `/nfc-vizitki/` → `/vizitki/`) into canonical
  ones.
- **Blog pagination** (`/blog/page/N/`) is intentionally `noindex`'d
  (`nfc_paged_title` + `rel=prev/next`) — articles stay discoverable via the sitemap
  and internal "related articles" links instead, avoiding thin-duplicate pagination
  pages in the index.
- Each product/solution page combines shared blocks + FAQ + price table + gallery +
  a collapsible long-form SEO text block.

## Notes

- Theme version is bumped on every build (see `style.css` header) — useful when the
  host runs a page-cache/minify plugin that needs a manual cache flush after
  deploy, since asset URLs aren't cache-busted by the plugin automatically.
- No build step: edit PHP/CSS/JS directly, zip the theme folder, upload via
  WordPress admin or FTP to `wp-content/themes/nfc-msk/`.

---

## Русская версия

**Задача:** сайт [nfc-msk.ru](https://nfc-msk.ru) — продажа NFC-товаров (визитки,
карты, метки, стикеры, брелоки, браслеты, бейджи, таблички) в Москве — работал на
купленной теме Impreza, которая была тяжелее, чем нужно, и плохо поддавалась
полному контролю под SEO. Нужна была самостоятельная тема с нуля: быстрая, простая
для ручного редактирования карточек товаров и без риска SEO-дублей.

**Результат:** самостоятельная WordPress-тема (без родительской темы, без
конструктора страниц, без сторонних JS-библиотек) со своей системой шаблонов,
полным каталогом товаров/решений NFC, премиальным визуальным стилем «Emerald &
Gold» и встроенной SEO-логикой (редиректы старых URL, канонизация пагинации,
sitemap) — контент правится прямо HTML внутри шаблонов, без знания PHP.

**Стек:** чистый PHP (без родительской темы и билдеров), чистый CSS/JS без
сторонних библиотек, SVG-иконки/логотип собственной отрисовки, шрифты Cormorant
Garamond + Nunito Sans.

**Архитектура:** общий верх/низ страницы (`inc/nfc-shell-*`), набор шаблонов под
каждый тип страницы (главная/блог/о компании/помощь/статья/страница), карточки
товаров и решений — обычный HTML в шаблонах (не PHP-массивы и не шорткоды —
чтобы контент правился руками без программирования).

**SEO:** 301-редиректы старых URL на канонические, `noindex` для пагинации блога
(статьи остаются доступны через карту сайта и «читайте также»), у каждой товарной
страницы — блоки FAQ, цены, галерея и сворачиваемый SEO-текст.
