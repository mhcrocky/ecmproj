<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
	protected $table = 'brands';

	protected $fillable = ['name', 'slug', 'logo'];

	public function setNameAttribute($value){
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = Str::slug($value);
	}

	public function products(){
		// $brand->products
		return $this->hasMany(Product::class);
	}
}
