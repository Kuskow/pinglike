<?php
if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = [];
}

$lang = array_merge($lang, [
	'PINGLIKE_BUTTON'            => 'Спасибо / Супер / Здорово',
	'NOTIFICATION_TYPE_PINGLIKE' => 'Кто-то поблагодарил вас за сообщение',

	// Notification text. Replace the ⭐ emoji with any symbol (e.g., ❤️, 👍, 🔥, 🔔)
	// %1$s — username, %2$s — post subject
	'PINGLIKE_NOTIFICATION_TEXT' => '⭐ от <strong>%1$s</strong> за сообщение «%2$s»',

	// Icon class from FontAwesome 4.7 (e.g., 'fa-star', 'fa-heart', 'fa-thumbs-up', 'fa-thumbs-o-up', 'fa-bell')
	'PINGLIKE_ICON'              => 'fa-star',

	// Active icon color as CSS color name (e.g., 'orange', 'gold', 'red', 'crimson', 'royalblue', 'green') or HEX code ('#e69d00')
	'PINGLIKE_ICON_COLOR'        => 'orange',
]);

