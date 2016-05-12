<?php

namespace WPCloudConvert\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Settings extends Eloquent {

    protected $table = 'cc_settings';

    protected $fillable = ['key', 'value'];

    public $timestamps = false;

    public static function get($key)
    {
        return self::where('key', $key)->first(['value']);
    }

    public static function set($key, $value)
    {
        $setting = self::firstOrNew(['key' => $key]);
        $setting->value = $value;
        $setting->save();
    }
}