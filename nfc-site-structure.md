# NFC MSK — структура сайта (Impreza Child)

Документация по архитектуре сайта и по тому, что нужно создать в WordPress вручную.

---

## 1. Файлы темы

```
wp-content/themes/nfc-msk/      # Theme Name: «NFC MSK» — отдельная тема, не «Impreza Child»
├── style.css                  # заголовок дочерней темы (обязателен для WP)
├── functions.php              # подключение стилей/скриптов + шрифтов
├── template-nfc-home.php      # Шаблон: NFC MSK — Главная
├── template-nfc-blog.php      # Шаблон: NFC MSK — Блог (список статей)
├── template-nfc-article.php   # Шаблон: NFC MSK — Статья (текст из редактора WP)
├── template-nfc-about.php     # Шаблон: NFC MSK — О компании
├── template-nfc-help.php      # Шаблон: NFC MSK — Помощь
├── nfc-site-structure.md      # этот файл
├── inc/
│   ├── nfc-shell-top.php      # общий верх: <head>, skip-ссылка, спрайт, шапка
│   ├── nfc-shell-bottom.php   # общий низ: футер, wp_footer
│   ├── nfc-icons.php          # SVG-спрайт line-art иконок (#ic-...)
│   ├── nfc-header.php         # шапка + mega-menu + мобильное меню (HTML)
│   └── nfc-footer.php         # футер с колонками + SEO-ссылки (HTML)
└── assets/
    ├── css/nfc-main.css       # все стили (префикс .nfc-*, палитра в начале файла)
    └── js/nfc-main.js         # меню, FAQ, sticky-header, появление при скролле
```

> Карточки и тексты — ОБЫЧНЫЙ HTML внутри template-*.php (правятся руками).
> Цвета меняются в одном месте — блок `:root`/`.nfc-page` в начале nfc-main.css.

### Шаблоны страниц — какой для чего

| Страница в WP | Шаблон (Атрибуты страницы → Шаблон) | Где править контент |
|---|---|---|
| Главная (`/`)            | NFC MSK — Главная     | template-nfc-home.php |
| Блог (`/blog/`)          | NFC MSK — Блог        | template-nfc-blog.php |
| Статья (`/blog/...`)     | NFC MSK — Статья      | редактор WordPress (текст), оформление — авто |
| О компании (`/o-kompanii/`)| NFC MSK — О компании | template-nfc-about.php |
| Помощь (`/pomoshch/`)    | NFC MSK — Помощь      | template-nfc-help.php |

Статьи: создайте Страницу (родитель — «Блог»), шаблон «NFC MSK — Статья», текст пишите
в обычном редакторе — он выводится крупным читабельным «prose»-оформлением. После добавления
статьи впишите её карточку в template-nfc-blog.php (скопируйте блок `<a class="nfc-article">`).

> Шаблон главной самодостаточный: он рендерит **собственные** header и footer и
> НЕ использует header.php/footer.php Impreza. Поэтому Impreza и WooCommerce не ломаются.
> `wp_head()` / `wp_footer()` сохранены — плагины, аналитика и формы продолжают работать.

---

## 2. Карта сайта (все URL)

### Главная
- `/` — премиальная витрина бренда

### Каталог товаров — `/catalog/`
- `/catalog/vizitki/` — NFC визитки
- `/catalog/karty/` — NFC карты
- `/catalog/stikery/` — NFC стикеры и наклейки
- `/catalog/metki/` — NFC метки
- `/catalog/breloki/` — NFC брелоки
- `/catalog/braslety/` — NFC браслеты
- `/catalog/bejdzhi/` — NFC бейджи
- `/catalog/tablichki/` — NFC таблички
- `/catalog/aksessuary/` — NFC аксессуары
- `/catalog/na-zakaz/` — изготовление на заказ

### Решения по сферам — `/resheniya/`
- `/resheniya/dlya-restoranov/`
- `/resheniya/dlya-salonov-krasoty/`
- `/resheniya/dlya-stomatologiy/`
- `/resheniya/dlya-oteley/`
- `/resheniya/dlya-rieltorov/`
- `/resheniya/dlya-meropriyatiy/`
- `/resheniya/dlya-ofisov/`
- `/resheniya/dlya-magazinov/`
- `/resheniya/dlya-avtoservisov/`
- `/resheniya/dlya-fitnes-klubov/`
- `/resheniya/dlya-uchebnyh-zavedeniy/`

### Готовые решения — `/resheniya-gotovye/`
- `/resheniya-gotovye/otzyvy/`
- `/resheniya-gotovye/menu/`
- `/resheniya-gotovye/vizitka/`
- `/resheniya-gotovye/wi-fi/`
- `/resheniya-gotovye/chayevye/`
- `/resheniya-gotovye/loyalnost/`
- `/resheniya-gotovye/dostup/`
- `/resheniya-gotovye/drugoe/`

### Блог — `/blog/`
- `/blog/chto-takoe-nfc/`
- `/blog/kak-rabotaet-nfc/`
- `/blog/nfc-ili-qr/`
- `/blog/kak-zapisat-nfc/`
- `/blog/idei/`
- `/blog/obzory/`
- `/blog/novosti/`

### О компании — `/o-kompanii/`
- `/o-kompanii/` — о нас
- `/proizvodstvo/`
- `/preimushestva/`
- `/otzyvy/`
- `/keysy/`
- `/partneram/`
- `/vakansii/`
- `/kontakty/`

### Помощь — `/pomoshch/`
- `/dostavka-i-oplata/`
- `/garantiya-i-vozvrat/`
- `/faq/`
- `/instruktsii/`
- `/sotrudnichestvo/`

### Служебные (не выводить заметно в главном меню)
- `/poisk/`, `/izbrannoe/`, `/sravnenie/`, `/korzina/`, `/oformlenie-zakaza/`, `/lk/`

### SEO / правовые (низ футера)
- `/sitemap/`
- `/politika-konfidentsialnosti/`
- `/polzovatelskoe-soglashenie/`
- `/personalnye-dannye/`
- `/otkaz-otvetstvennosti/`
- `/usloviya-ispolzovaniya/`

---

## 3. Что создать в WordPress вручную

Ссылки в меню и футере уже ведут на правильные slug. Страницы нужно создать,
чтобы ссылки не вели в 404. Создавайте **Страницы** (Pages) с указанными slug.

> При создании дочерней страницы делайте её родителем нужный раздел, чтобы URL
> совпал (например, страница `vizitki` с родителем `catalog` → `/catalog/vizitki/`).
> ИЛИ создавайте страницу сразу с нужным «Постоянная ссылка» = slug из карты выше.

### Приоритет 1 — важно для SEO (создать в первую очередь)
- `/catalog/` и все 10 подстраниц каталога — посадочные под товарные запросы
- `/resheniya/` и нишевые посадочные (`dlya-restoranov`, `dlya-salonov-krasoty` …)
- `/resheniya-gotovye/` и сценарии (`otzyvy`, `menu`, `wi-fi` …)
- `/blog/` + ключевые статьи (`chto-takoe-nfc`, `kak-rabotaet-nfc`, `nfc-ili-qr`)
- `/o-kompanii/`, `/preimushestva/`, `/otzyvy/`, `/keysy/`, `/kontakty/`

### Приоритет 2 — сервисные/доверие (можно позже)
- `/pomoshch/`, `/dostavka-i-oplata/`, `/garantiya-i-vozvrat/`, `/faq/`,
  `/instruktsii/`, `/sotrudnichestvo/`
- `/proizvodstvo/`, `/partneram/`, `/vakansii/`

### Приоритет 3 — правовые (нужны до запуска рекламы)
- `/politika-konfidentsialnosti/`, `/polzovatelskoe-soglashenie/`,
  `/personalnye-dannye/`, `/otkaz-otvetstvennosti/`, `/usloviya-ispolzovaniya/`,
  `/sitemap/`

### Служебные — только если есть магазин (WooCommerce)
- `/korzina/`, `/oformlenie-zakaza/`, `/lk/` — создаёт сам WooCommerce.
- `/poisk/`, `/izbrannoe/`, `/sravnenie/` — по мере добавления функционала.
- В header их НЕ выводим. В футере — только важные пользователю.

---

## 4. SEO-правила структуры

- `/catalog/` — категория «все товары»; `/catalog/vizitki/` — конкретный товар.
- `/resheniya/` — хаб сфер; `/resheniya/dlya-restoranov/` — нишевая посадочная
  (под запросы «NFC для ресторана», «NFC меню для кафе» и т.п.).
- `/resheniya-gotovye/` — хаб сценариев; `/resheniya-gotovye/otzyvy/` — конкретный сценарий.
- Только латиница в URL, без кириллицы.
- Не плодить дубли и одинаковые title/H1.
- Важные SEO-страницы не закрывать от индексации (проверьте Yoast/Rank Math).
- У каждой страницы — уникальные Title и H1 под её ключевой запрос.

---

## 5. Что в меню, а что только в футере

| Раздел                | Header (mega-menu) | Footer |
|-----------------------|:------------------:|:------:|
| Каталог товаров       | ✅ | ✅ |
| Решения по сферам     | ✅ | ✅ |
| Готовые решения       | ✅ | ✅ |
| Блог                  | ✅ | (через статьи) |
| О компании            | ✅ | ✅ |
| Помощь                | ✅ | ✅ (весь раздел) |
| Контакты              | в шапке (телефон + кнопка) | ✅ колонка |
| Служебные             | ❌ | частично |
| Правовые / Карта сайта| ❌ | ✅ нижняя строка |

---

## 6. Где что редактировать

Всё содержимое — в одном файле **`inc/nfc-data.php`**:

| Что меняем                         | Функция в nfc-data.php   |
|------------------------------------|--------------------------|
| Контакты (телефон, email, соцсети) | `nfc_contacts()`         |
| Карточки каталога                  | `nfc_products()`         |
| Карточки сфер                      | `nfc_industries()`       |
| Готовые решения                    | `nfc_ready_solutions()`  |
| Карточки блога (превью на главной) | `nfc_blog_links()`       |
| Рубрики блога (меню)               | `nfc_blog_categories()`  |
| Преимущества                       | `nfc_advantages()`       |
| Шаги «Как работает NFC»            | `nfc_how_it_works()`     |
| FAQ                                | `nfc_faq_items()`        |
| Главное меню (header)              | `nfc_main_menu()`        |
| Колонки футера                     | `nfc_footer_columns()`   |
| Правовые ссылки                    | `nfc_legal_links()`      |

Каждая карточка: `title`, `description`, `url`, `icon` (emoji-плейсхолдер),
`image` (путь к мокапу — оставьте пустым, пока нет фото), `badge` (опционально).
Чтобы заменить иконку реальным мокапом — впишите URL в `image`.

---

## 7. Как включить шаблон и сделать страницу главной

1. **Активируйте тему** «Impreza Child»: Внешний вид → Темы.
   (Родительская Impreza должна быть установлена.)
2. **Создайте страницу**: Страницы → Добавить новую. Заголовок, например, «Главная».
3. Справа в блоке **«Атрибуты страницы» → Шаблон** выберите
   **«NFC MSK — Главная»**. Опубликуйте.
4. **Назначьте главной**: Настройки → Чтение → «На главной странице отображать» →
   «Статическую страницу» → выберите созданную «Главную».
5. Сохраните. Откройте `/` — должна открыться премиальная витрина NFC MSK.

> Если меню/иконки не появились — обновите постоянные ссылки
> (Настройки → Постоянные ссылки → Сохранить) и очистите кэш.

---

## 8. Как откатиться, если что-то сломается

- **Быстрый откат темы:** Внешний вид → Темы → активируйте обратно родительскую
  «Impreza» (или прежнюю тему). Дочерняя тема ничего в Impreza не перезаписывает.
- **Откат главной:** Настройки → Чтение → верните прежний вариант главной.
- **Полное удаление:** удалите папку `wp-content/themes/Impreza-child/`.
  Это не затрагивает контент, страницы и WooCommerce.
- **Стили только на главной:** CSS/JS подключаются лишь на странице с шаблоном
  `template-nfc-home.php` / на front page — остальной сайт не затрагивается.
- Перед изменениями рекомендуется бэкап через плагин (UpdraftPlus и т.п.).

---

## 9. WooCommerce

- Шаблон не вмешивается в WooCommerce: ссылки каталога ведут на slug `/catalog/...`.
- **Если WooCommerce активен:** замените URL в `nfc_products()` на ссылки ваших
  категорий/товаров Woo, либо сделайте slug категорий совпадающими с картой.
- **Если магазина нет:** оставьте обычные страницы-заглушки по этим slug.
- Служебные `/korzina/`, `/oformlenie-zakaza/`, `/lk/` — управляются самим Woo;
  в меню их не выводим.
