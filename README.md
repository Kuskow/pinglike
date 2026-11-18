# PingLike

An extension for the phpBB Forum Software package that adds a lightweight "Star / PingLike" button to posts. Clicking the star sends an instant board notification to the post author without cluttering topics with public counters.

## Features
* Adds a clean star button to the post action bar (`prosilver` compatible).
* Sends an instant native phpBB board notification to the post author.
* Highlights the starred state with a subtle blue tint and a gold star icon.
* Automatically enables board notifications for all users upon installation.
* Lightweight and fast — works via AJAX without page reloads and without creating extra database tables for counters.

## Requirements
* phpBB 3.3.0 or higher
* PHP 7.2.0 or higher

## Installation
1. Download the latest release (`kuskow_pinglike_1.0.0.zip`) from the [Releases](https://github.com) page.
2. Unzip the archive and upload the `kuskow` folder to the `ext/` directory of your phpBB board (so the path looks like `ext/kuskow/pinglike/composer.json`).
3. Navigate in the ACP to **Customise -> Manage extensions**.
4. Look for **PingLike** under the Disabled Extensions list, and click its **Enable** link.

## Uninstall
1. Navigate in the ACP to **Customise -> Manage extensions**.
2. Look for **PingLike** under the Enabled Extensions list, and click its **Disable** link.
3. To permanently uninstall, click **Delete Data** and remove the `ext/kuskow/pinglike` directory.

---

# PingLike (Русский)

Расширение для phpBB, добавляющее аккуратную кнопку со звездой в панель действий сообщения. При нажатии автор сообщения получает мгновенное уведомление на форуме без перегрузки тем публичными счётчиками.

## Возможности
* Добавляет кнопку со звездой в панель кнопок сообщения (совместимо со стилем `prosilver`).
* Отправляет штатное уведомление на форуме автору сообщения через AJAX без перезагрузки страницы.
* Выделяет нажатую кнопку мягким бледно-синим фоном и жёлтой звездой.
* Автоматически активирует получение уведомлений на форуме для всех пользователей сразу после установки.

## Требования
* phpBB 3.3.0 или выше
* PHP 7.2.0 или выше

## Установка
1. Скачайте архив релиза (`kuskow_pinglike_1.0.0.zip`) со страницы [Releases](https://github.com).
2. Распакуйте архив и загрузите папку `kuskow` в директорию `ext/` в корне вашего форума (итоговый путь должен быть `ext/kuskow/pinglike/composer.json`).
3. В Администраторском разделе перейдите во вкладку **Персонализация -> Управление расширениями**.
4. Найдите **PingLike** в списке отключённых расширений и нажмите **Включить**.

## License
[GNU General Public License v2](license.txt)
