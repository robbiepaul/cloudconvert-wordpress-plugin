<?php

namespace WPCloudConvert\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Models\Post;
use Herbert\Framework\Notifier;
use WPCloudConvert\Repositories\PostsRepository;
use WPCloudConvert\Services\CloudConvertAPI;

class ConversionController
{
    /**
     * @var CloudConvertAPI
     */
    private $api;
    /**
     * @var PostsRepository
     */
    private $postsRepository;

    public function __construct(CloudConvertAPI $cloudConvertAPI, PostsRepository $postsRepository)
    {
        $this->api = $cloudConvertAPI;
        $this->postsRepository = $postsRepository;
    }
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
        $types = $this->api->getConversionTypesFor($post);

        return view('@WPCloudConvert/conversion/create.twig', [
            'post' => $post,
            'types' => $types,
            'filename' => basename($post->guid)
        ] );
    }

    public function store(Http $http)
    {
        $data = $http->all();
        $post = Post::where('ID', $data['id'])->first();
        $this->validate($post);
        $type = $data['type'];
        $converterOptions = $data['converteroptions'][$type];
        $conversion = $this->postsRepository->create([
            'post_type' => 'conversion',
            'post_title' => basename($post->guid).' to '.strtoupper($type),
        ]);
        $this->postsRepository->addMeta($conversion, [
            'converteroptions' => $converterOptions,
            'status' => 'created',
            'type' => $type
        ]);

        return redirect_response(admin_url());
    }

    public function showAll()
    {
        return redirect_response(admin_url('edit.php?post_type=conversion'));
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
