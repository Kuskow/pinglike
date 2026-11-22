<?php
/**
 *
 * PingLike. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026, Kuskow
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kuskow\pinglike\migrations;

class install_pinglike extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		$sql = 'SELECT notification_type_id
				FROM ' . $this->table_prefix . "notification_types
				WHERE notification_type_name = 'kuskow.pinglike.notification.type.ping'";
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return (bool) $row;
	}

	public function update_data()
	{
		return [
			['custom', [[$this, 'install_notification_type']]],
		];
	}

	public function revert_data()
	{
		return [
			['custom', [[$this, 'remove_notification_type']]],
		];
	}

	public function install_notification_type()
	{
		$sql = 'INSERT IGNORE INTO ' . $this->table_prefix . "notification_types
				(notification_type_name, notification_type_enabled)
				VALUES ('kuskow.pinglike.notification.type.ping', 1)";
		$this->db->sql_query($sql);
	}

	public function remove_notification_type()
	{
		$sql = 'DELETE FROM ' . $this->table_prefix . "notification_types
				WHERE notification_type_name = 'kuskow.pinglike.notification.type.ping'";
		$this->db->sql_query($sql);
	}
}

