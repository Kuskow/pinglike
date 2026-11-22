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
	'PINGLIKE_BUTTON'            => 'Thanks / Super / Great',
	'NOTIFICATION_TYPE_PINGLIKE' => 'Someone liked your post',

	// Notification text. Replace the ⭐ emoji with any symbol (e.g., ❤️, 👍, 🔥, 🔔)
	// %1$s — username, %2$s — post subject
	'PINGLIKE_NOTIFICATION_TEXT' => '⭐ from <strong>%1$s</strong> for post “%2$s”',

	// Icon class from FontAwesome 4.7 (e.g., 'fa-star', 'fa-heart', 'fa-thumbs-up', 'fa-thumbs-o-up', 'fa-bell')
	'PINGLIKE_ICON'              => 'fa-star',

	// Active icon color as CSS color name (e.g., 'orange', 'gold', 'red', 'crimson', 'royalblue', 'green') or HEX code ('#e69d00')
	'PINGLIKE_ICON_COLOR'        => 'orange',
]);
