<?php
namespace kuskow\pinglike\controller;

use Symfony\Component\HttpFoundation\JsonResponse;

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
        if ($this->user->data['user_id'] == ANONYMOUS)
        {
            return new JsonResponse(['error' => 'Auth required'], 403);
        }

        $token = $this->request->variable('hash', '');
        if (!$this->request->is_set_post('hash') || !check_link_hash($token, 'pinglike_' . (int) $post_id))
        {
            return new JsonResponse(['error' => 'Invalid CSRF token'], 403);
        }

        $sql = 'SELECT post_id, topic_id, poster_id, post_subject
                FROM ' . POSTS_TABLE . '
                WHERE post_id = ' . (int) $post_id;
        $result = $this->db->sql_query($sql);
        $post_data = $this->db->sql_fetchrow($result);
        $this->db->sql_freeresult($result);

        if (!$post_data)
        {
            return new JsonResponse(['error' => 'Post not found'], 404);
        }

        if ($post_data['poster_id'] != ANONYMOUS)
        {
            $liker_id = (int) $this->user->data['user_id'];
            $real_post_id = (int) $post_data['post_id'];
            $unique_id = (abs(crc32($real_post_id . ':' . $liker_id)) % 16777214) + 1;

            $notification_data = [
                'unique_ping_id' => $unique_id,
                'post_id'        => $real_post_id,
                'topic_id'       => (int) $post_data['topic_id'],
                'poster_id'      => (int) $post_data['poster_id'],
                'liker_id'       => $liker_id,
                'post_subject'   => $post_data['post_subject'],
            ];

            $this->notification_manager->add_notifications('kuskow.pinglike.notification.type.ping', $notification_data);
        }

        return new JsonResponse(['status' => 'ok']);
    }
}

