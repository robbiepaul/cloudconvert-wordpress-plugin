<?php

namespace WPCloudConvert\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Notifier;

class AdminController {

    public $optionName = 'cloudconvert_settings';
    protected $options = [ 'api_key' ];

    public function settings()
    {
        return view('@WPCloudConvert/admin/configure.twig', ['fd' => get_option( $this->optionName ) ] );
    }

    public function save(Http $http)
    {
        $inputs = $http->only($this->options);
        if ( ! $this->validate($inputs) )
        {
            return redirect_response( panel_url('WPCloudConvert::settings') )->with('__form_data', $inputs);
        }
        update_option($this->optionName, $inputs);
        Notifier::success('Settings have been saved', true);
        return redirect_response(panel_url('WPCloudConvert::settings'));
    }

    protected function validate($inputs)
    {
        foreach ($inputs as $input)
        {
            if (empty($input))
            {
                Notifier::error('Please complete all fields', true);
                return false;
            }
        }
        return true;
    }
}