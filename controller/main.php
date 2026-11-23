<?php
namespace kuskow\pinglike\controller;

use Symfony\Component\HttpFoundation\Response;

class main
{
	protected $db;
	protected $user;
	protected $request;
	protected $notification_manager;

	public function __construct($db, $user, $request, $notification_manager)
	{
		$this->db = $db;
		$this->user = $user;
		$this->request = $request;
		$this->notification_manager = $notification_manager;
	}

	public function handle($post_id)
	{
		$post_id = (int) $post_id;

		if (
			$this->user->data['user_id'] != ANONYMOUS
			&& !$this->user->data['is_bot']
			&& check_link_hash($this->request->variable('hash', ''), 'pinglike_' . $post_id)
		)
		{
			$sql = 'SELECT topic_id, poster_id, post_subject
					FROM ' . POSTS_TABLE . '
					WHERE post_id = ' . $post_id;
			$result = $this->db->sql_query($sql);
			$post_data = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			if ($post_data && $post_data['poster_id'] != ANONYMOUS)
			{
				$liker_id = (int) $this->user->data['user_id'];

				$this->notification_manager->add_notifications('kuskow.pinglike.notification.type.ping', [
					'unique_ping_id' => (abs(crc32($post_id . ':' . $liker_id)) % 16777214) + 1,
					'post_id'        => $post_id,
					'topic_id'       => (int) $post_data['topic_id'],
					'poster_id'      => (int) $post_data['poster_id'],
					'liker_id'       => $liker_id,
					'post_subject'   => $post_data['post_subject'],
				]);
			}
		}

		return new Response('', Response::HTTP_NO_CONTENT);
	}
}

