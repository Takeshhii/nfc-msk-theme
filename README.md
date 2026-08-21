# NFC MSK — WordPress Theme

Custom WordPress theme with built-in technical SEO infrastructure, built for
[nfc-msk.ru](https://nfc-msk.ru), an NFC-products business I run (cards, tags,
stickers, keychains, bracelets, badges, plates).

## Problem

The site ran on a purchased theme (Impreza) that was heavier than it needed to
be and kept getting in the way whenever I needed to control something for SEO
— URL structure, indexation of near-duplicate pages, template-level metadata.
Page-builder abstractions make that kind of control harder, not easier.

## Solution

A standalone theme, no parent theme, no page builder, with SEO handling built
directly into the templates instead of bolted on: legacy-URL redirects,
deliberate `noindex` on low-value duplicate pages (paginated blog listings),
and a consistent per-page-type structure that keeps metadata predictable.
Product and page content is plain HTML inside the templates by design — no PHP
arrays, no shortcodes — so copy can be edited directly without touching logic.

## Key features

- **301 redirect map** (`nfc_legacy_redirects()` in `functions.php`) collapsing
  old duplicate URL paths onto canonical ones (e.g. `/nfc-vizitki/` →
  `/vizitki/`).
- **Deliberate pagination `noindex`** — `/blog/page/N/` is excluded from the
  index (with `rel=prev/next`), while articles stay fully discoverable through
  the XML sitemap and on-page "related articles" links. Nothing drops out of
  the index; it just stops competing with the real article pages.
- **Per-page-type template system** — home, blog, article, about, help, and a
  generic page template, each with a shared header/footer shell
  (`inc/nfc-shell-top.php` / `nfc-shell-bottom.php`).
- **Product/solution catalog** (`inc/nfc-catalog.php`) — every product page
  follows the same pattern: shared blocks, FAQ, pricing table, gallery, and a
  collapsible long-form SEO text block.
- Hand-drawn line-art SVG icon and logo system, no icon library.

## Tech stack

Pure PHP (no parent theme, no builder dependency), vanilla CSS
(`assets/css/nfc-main.css`, `.nfc-*` prefix, design tokens in `:root`) and
vanilla JS (`assets/js/nfc-main.js` — menu, FAQ accordion, sticky header,
scroll reveal) — no third-party frontend libraries.

## Architecture

```
inc/nfc-shell-top.php / nfc-shell-bottom.php   shared <head> / header / footer
template-nfc-{home,blog,about,help,article,page}.php   one template per page type
page.php / single.php / category.php / index.php / 404.php   WP fallbacks
inc/nfc-catalog.php                             product & solution catalog data
inc/nfc-header.php / nfc-footer.php             mega-menu, footer, SEO links
inc/nfc-logos-marquee.php                       client-logo strip
```

## My role

Full theme design and build, including the redirect/indexation logic — that
part specifically exists because I own the site's SEO and needed control that
the previous theme didn't give me.

## Challenges / lessons

The host runs a page-cache/minify plugin that doesn't cache-bust automatically
on deploy, so a theme-version bump in `style.css` alone isn't enough — the
plugin's cache still has to be cleared by hand after every FTP deploy, or the
old CSS/JS sticks around silently.

## Status

Live, in production, actively maintained.

## Future improvements

Move deploys off manual FTP zip uploads onto something scriptable, and
automate the cache-clear step that currently has to be done by hand in
wp-admin after every deploy.

---

## Русская версия

Собственная тема WordPress со встроенной технической SEO-инфраструктурой,
сделанная для [nfc-msk.ru](https://nfc-msk.ru) — бизнеса NFC-товаров, который я
веду (визитки, карты, метки, стикеры, брелоки, браслеты, бейджи, таблички).

### Проблема

Сайт работал на купленной теме (Impreza), которая была тяжелее, чем требовалось,
и постоянно мешала, когда нужно было контролировать что-то под SEO — структуру
URL, индексацию почти-дублирующих страниц, метаданные на уровне шаблонов.
Абстракции конструктора страниц такой контроль усложняют, а не упрощают.

### Решение

Самостоятельная тема — без родительской темы, без конструктора страниц, с
SEO-логикой, встроенной прямо в шаблоны, а не прикрученной сбоку: редиректы
старых URL, намеренный `noindex` на малоценных дублях (пагинация блога) и
единообразная структура по типам страниц, которая делает метаданные
предсказуемыми. Контент товаров и страниц — обычный HTML внутри шаблонов, это
осознанное решение: не PHP-массивы и не шорткоды, чтобы тексты правились
напрямую без касания логики.

### Ключевые возможности

- **Карта 301-редиректов** (`nfc_legacy_redirects()` в `functions.php`),
  схлопывающая старые дублирующие пути на канонические (например,
  `/nfc-vizitki/` → `/vizitki/`).
- **Намеренный `noindex` пагинации** — `/blog/page/N/` исключены из индекса (с
  `rel=prev/next`), при этом статьи полностью доступны через XML-карту сайта и
  блоки «читайте также» на страницах. Из индекса ничего не выпадает — просто
  перестаёт конкурировать с самими статьями.
- **Система шаблонов по типам страниц** — главная, блог, статья, о компании,
  помощь и универсальная страница, у каждой общий каркас шапки и футера
  (`inc/nfc-shell-top.php` / `nfc-shell-bottom.php`).
- **Каталог товаров и решений** (`inc/nfc-catalog.php`) — каждая товарная
  страница по одной схеме: общие блоки, FAQ, таблица цен, галерея и
  сворачиваемый развёрнутый SEO-текст.
- Собственные line-art SVG-иконки и логотип, без иконочных библиотек.

### Стек

Чистый PHP (без родительской темы и зависимости от билдера), чистый CSS
(`assets/css/nfc-main.css`, префикс `.nfc-*`, дизайн-токены в `:root`) и чистый
JS (`assets/js/nfc-main.js` — меню, аккордеон FAQ, sticky-шапка, появление при
скролле) — без сторонних фронтенд-библиотек.

### Моя роль

Дизайн и разработка темы целиком, включая логику редиректов и индексации — эта
часть существует именно потому, что SEO сайта на мне, и нужен был контроль,
которого прежняя тема не давала.

### Что было сложным

На хостинге стоит плагин кэширования и минификации, который не сбрасывает кэш
автоматически при деплое, поэтому одного поднятия версии темы в `style.css`
недостаточно — кэш плагина всё равно приходится чистить руками после каждой
заливки по FTP, иначе старые CSS/JS продолжают отдаваться незаметно.

### Статус

В продакшене, активно поддерживается.

### Что дальше

Перевести деплой с ручной заливки zip по FTP на что-то скриптуемое и
автоматизировать сброс кэша, который сейчас приходится делать руками в админке
после каждого деплоя.
