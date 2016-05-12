<?php

namespace WPCloudConvert\Controllers;

class FilesController {

    public function upload()
    {
        return view('@WPCloudConvert/files/upload.twig' );
    }
}