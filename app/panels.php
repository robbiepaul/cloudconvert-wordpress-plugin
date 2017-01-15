<?php namespace WPCloudConvert;

/** @var \Herbert\Framework\Panel $panel */

$panel->add([
    'type'   => 'wp-sub-panel',
    'parent' => 'options-general.php',
    'as'     => 'settings',
    'title'  => 'CloudConvert',
    'slug'   => 'cloudconvert-settings',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@settings',
    'post'   => __NAMESPACE__.'\Controllers\AdminController@save',
]);

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
    'as'     => 'convert',
    'title'  => 'Convert',
    'slug'   => 'cloudconvert-create',
    'uses'   => __NAMESPACE__ . '\Controllers\ConversionController@create'
]);


