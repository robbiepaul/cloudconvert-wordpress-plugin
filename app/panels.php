<?php namespace WPCloudConvert;

/** @var \Herbert\Framework\Panel $panel */

$panel->add([
    'type'   => 'panel',
    'as'     => 'mainPanel',
    'title'  => 'CloudConvert',
    'slug'   => 'cloudconvert-files',
    'icon'   => Helper::assetUrl('/img/logo.png'),
    'uses'   => function()
    {
        return '';
    }
]);

$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'files',
    'title'  => 'Files',
    'slug'   => 'cloudconvert-files',
    'uses'   => __NAMESPACE__ . '\Controllers\FilesController@list'
]);

$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'configure',
    'title'  => 'Configure',
    'slug'   => 'cloudconvert-configure',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@configure',
    'post'   => __NAMESPACE__.'\Controllers\AdminController@save',
]);

$panel->add([
    'type'   => 'wp-sub-panel',
    'parent' => 'upload.php',
    'as'     => 'mediaSubpanel',
    'title'  => 'Convert file',
    'slug'   => 'cloudconvert-files-upload',
    'uses'   => __NAMESPACE__ . '\Controllers\FilesController@upload',
    'post'   => __NAMESPACE__.'\Controllers\FilesController@saveUpload'
]);