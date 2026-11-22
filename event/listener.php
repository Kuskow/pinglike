<?php
/**
 *
 * PingLike. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026, Kuskow
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kuskow\pinglike\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $helper;
	protected $user;

	public function __construct($helper, $user)
	{
		$this->helper = $helper;
		$this->user = $user;
	}

	public static function getSubscribedEvents()
	{
		return [
			'core.user_setup'                => 'load_language_on_setup',
			'core.viewtopic_modify_post_row' => 'add_pinglike_url',
		];
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'kuskow/pinglike',
			'lang_set' => 'common',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function add_pinglike_url($event)
	{
		if ($this->user->data['user_id'] == ANONYMOUS)
		{
			return;
		}

		$row = $event['row'];
		$poster_id = isset($row['user_id']) ? (int) $row['user_id'] : ANONYMOUS;

		if ($poster_id == ANONYMOUS)
		{
			return;
		}

		$post_row = $event['post_row'];
		$post_id = (int) $row['post_id'];

		$post_row['U_PINGLIKE'] = $this->helper->route(
			'kuskow_pinglike_send',
			[
				'post_id' => $post_id,
				'hash'    => generate_link_hash('pinglike_' . $post_id),
			],
			true,
			false
		);

		$event['post_row'] = $post_row;
	}
}

