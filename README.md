# PingLike

An extension for phpBB that adds a lightweight "Star / PingLike" button to posts to notify authors instantly without public counters.

## Features
* Clean star button (`prosilver` compatible) in the post action bar.
* Instant AJAX board notifications to post authors without page reloads.
* Auto-enables board notifications for all users upon installation.
* Optional email notifications with customizable UCP settings and fixed subject lines.
* Easy customization of icons, active colors, and emojis via language files.
* No extra database tables for counters.

## Requirements
* phpBB 3.3.0+ / PHP 7.2.0+

## Installation
1. Download the latest release archive from [Releases](https://github.com/Kuskow/pinglike/releases).
2. Extract and upload the `kuskow` folder to your board's `ext/` directory (`ext/kuskow/pinglike/composer.json`).
3. Go to **ACP -> Customise -> Manage extensions** and click **Enable** under Disabled Extensions.

## Customization
Edit `ext/kuskow/pinglike/language/en/common.php` (and `language/ru/common.php`) and purge the ACP cache to change:
* `PINGLIKE_ICON` — FontAwesome 4.7 icon class (e.g., `'fa-star'`).
* `PINGLIKE_ICON_COLOR` — CSS color or HEX code (e.g., `'gold'`).
* `PINGLIKE_NOTIFICATION_TEXT` — notification text and emoji.

## Uninstall
1. Go to **ACP -> Customise -> Manage extensions** and click **Disable** for PingLike.
2. Click **Delete Data** and remove `ext/kuskow/pinglike` directory to uninstall completely.

---

# PingLike (Русский)

Расширение для phpBB, добавляющее кнопку со звездой в панель действий сообщения для отправки личных уведомлений автору без публичных счётчиков.

## Возможности
* Добавление кнопки со звездой в стиле `prosilver` без перезагрузки страницы (AJAX).
* Визуальная индикация нажатия и автоматическая активация уведомлений для пользователей.
* Опциональные e-mail уведомления с настраиваемыми иконками и цветами через языковой файл.
* Без создания дополнительных таблиц в БД.

## Требования
* phpBB 3.3.0+ / PHP 7.2.0+

## Установка и удаление
1. **Установка:** скачайте релиз с [Releases](https://github.com/Kuskow/pinglike/releases), распакуйте в `ext/kuskow/pinglike/` и включите через **АСР -> Персонализация -> Управление расширениями**.
2. **Настройка:** редактируйте файл `language/ru/common.php` (иконки и цвета), затем очистите кэш.
3. **Удаление:** отключите и удалите данные через АСР, затем сотрите папку с сервера.

## License
[GNU General Public License v2](license.txt)
