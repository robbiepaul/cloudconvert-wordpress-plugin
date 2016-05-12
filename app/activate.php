<?php

/** @var  \Herbert\Framework\Application $container */
/** @var  \Herbert\Framework\Http $http */
/** @var  \Herbert\Framework\Router $router */
/** @var  \Herbert\Framework\Enqueue $enqueue */
/** @var  \Herbert\Framework\Panel $panel */
/** @var  \Herbert\Framework\Shortcode $shortcode */
/** @var  \Herbert\Framework\Widget $widget */

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('cc_conversions', function($table)
{
    $table->increments('id');
    $table->string('file_name');
    $table->string('file_path');
    $table->string('input_format');
    $table->string('output_format');
    $table->mediumText('converteroptions');
    $table->string('process_id');
    $table->string('process_url');
    $table->string('download_url');
    $table->boolean('import_media_library');
});

Capsule::schema()->create('cc_settings', function($table)
{
    $table->increments('id');
    $table->string('key');
    $table->string('value');
});