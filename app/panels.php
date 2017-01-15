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
    'slug'   => 'cloudconvert-conversions',
    'icon'   => Helper::assetUrl('/img/logo.png'),
    'uses'   => function()
    {
        return '';
    }
]);

$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'conversions',
    'title'  => 'Conversions',
    'slug'   => 'cloudconvert-conversions',
    'uses'   => __NAMESPACE__ . '\Controllers\ConversionController@showAll'
]);

$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'convert',
    'title'  => 'Convert',
    'slug'   => 'cloudconvert-create',
    'uses'   => __NAMESPACE__ . '\Controllers\ConversionController@create',
    'post'   => __NAMESPACE__.'\Controllers\ConversionController@store',
]);


