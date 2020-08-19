<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['key', 'value'];

    /**
    * @param key
    */
    public static function get($key){
    	$setting = new self();
    	$entry = $setting->where('key', $key)->first();
    	if(!$entry){
    		return;
    	}
    	return $entry->value;
    }

    /**
    * @param $key
    * @param null $value
    * return bool
    */
    public static function set($key, $value = null){
    	$Setting = new self();
    	$entry = $settings->where('key', $key)->firstOrFail();
    	$entry->value = $value;
    	$entry->saveOrFail();
    	// Set Config key -->
    	Config::set('key', $value);
    	if(Config::get($key) == $value){
    		return true;
    	}
    	return false;
    }
}
