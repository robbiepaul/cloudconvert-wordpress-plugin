<?php
namespace WPCloudConvert\Services;

use Herbert\Framework\Models\Post;
use RobbieP\CloudConvertLaravel\CloudConvert;

class CloudConvertAPI
{
    public function __construct()
    {
        $settings = get_option('cloudconvert_settings');
        $this->cc = new CloudConvert($settings);
    }

    public function getConversionTypesFor($file)
    {
        if($file instanceof Post) {
            $file = get_attached_file($file->ID);
        }
        return $this->cc->file($file)->conversionTypes();
    }

}
