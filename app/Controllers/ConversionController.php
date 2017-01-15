<?php

namespace WPCloudConvert\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Models\Post;
use Herbert\Framework\Notifier;

class ConversionController {

    public static function filter($filters, $post)
    {
        $filters['convert'] = '<a href="'.panel_url('WPCloudConvert::convert', ['id' => $post->ID]).'">Convert</a>';
        return $filters;
    }
    public function create(Http $http)
    {
        $id = $http->only('id');
        $post = Post::find($id)->first();
        $this->validate($post);
        return view('@WPCloudConvert/files/upload.twig', [
            'post' => $post
        ] );
    }

    /**
     * @param $post
     */
    public function validate($post)
    {
        if (!$post || $post->post_type !== 'attachment') {
            Notifier::error(__('<strong>Error:</strong> You can only convert uploaded media'));
            exit;
        }
    }
}