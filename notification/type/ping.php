<?php
/**
 *
 * PingLike. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026, Kuskow
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kuskow\pinglike\notification\type;

class ping extends \phpbb\notification\type\base
{
	protected $user_loader;

	public function set_user_loader(\phpbb\user_loader $user_loader)
	{
		$this->user_loader = $user_loader;
	}

	public function get_type()
	{
		return 'kuskow.pinglike.notification.type.ping';
	}

	public static $notification_option = [
		'lang'  => 'NOTIFICATION_TYPE_PINGLIKE',
		'group' => 'NOTIFICATION_GROUP_MISCELLANEOUS',
	];

	public function is_available()
	{
		return true;
	}

	public static function get_item_id($data)
	{
		return (int) $data['unique_ping_id'];
	}

	public static function get_item_parent_id($data)
	{
		return (int) $data['topic_id'];
	}

	public function find_users_for_notification($data, $options = [])
	{
		return $this->check_user_notification_options([$data['poster_id']], $options);
	}

	public function users_to_query()
	{
		return [$this->get_data('liker_id')];
	}

	public function get_avatar()
	{
		return $this->user_loader->get_avatar($this->get_data('liker_id'), false, true);
	}

	public function get_title()
	{
		$username = $this->user_loader->get_username($this->get_data('liker_id'), 'no_profile');
		return $this->language->lang('PINGLIKE_NOTIFICATION_TEXT', $username, $this->get_data('post_subject'));
	}

	public function get_url()
	{
		$real_post_id = (int) $this->get_data('real_post_id');
		return append_sid($this->phpbb_root_path . 'viewtopic.' . $this->php_ext, "p={$real_post_id}#p{$real_post_id}");
	}

	public function get_email_template()
	{
		return '@kuskow_pinglike/pinglike';
	}

	public function get_email_template_variables()
	{
		$liker_id = (int) $this->get_data('liker_id');
		$real_post_id = (int) $this->get_data('real_post_id');

		return [
			'LIKER_NAME'   => htmlspecialchars_decode($this->user_loader->get_username($liker_id, 'username')),
			'POST_SUBJECT' => htmlspecialchars_decode(censor_text($this->get_data('post_subject'))),
			'U_POST'       => generate_board_url() . '/viewtopic.' . $this->php_ext . "?p={$real_post_id}#p{$real_post_id}",
		];
	}

	public function create_insert_array($data, $pre_create_data = [])
	{
		$this->set_data('liker_id', (int) $data['liker_id']);
		$this->set_data('real_post_id', (int) $data['post_id']);
		$this->set_data('post_subject', (string) $data['post_subject']);

		return parent::create_insert_array($data, $pre_create_data);
	}
}

