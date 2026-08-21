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
