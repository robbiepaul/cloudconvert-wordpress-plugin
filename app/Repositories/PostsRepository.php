<?php
namespace WPCloudConvert\Repositories;

use Herbert\Framework\Models\Post;
use Herbert\Framework\Models\PostMeta;

class PostsRepository
{
    /**
     * @param $data
     * @return Post
     */
    public function create($data)
    {
        $defaults = [
            'post_content',
            'post_excerpt',
            'to_ping',
            'pinged',
            'post_content_filtered',
        ];
        foreach($defaults as $field) {
            if(empty($data[$field])) {
                $data[$field] = '';
            }
        }

        return Post::create($data);
    }

    public function addMeta(Post $post, $data)
    {
        foreach($data as $meta_key => $meta_value) {
            add_post_meta($post->ID, $meta_key, $meta_value);
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
