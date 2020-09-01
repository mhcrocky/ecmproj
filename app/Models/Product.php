<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';

	protected $fillable = [
		'brand_id', 'sku', 'name', 'slug', 'description', 'quantity', 'weight', 'price', 'sale_price', 'status', 'featured',
	];

	protected $casts = [
		'quantity'	=>	'integer',
		'brand_id'	=>	'integer',
		'status'	=>	'boolean',
		'featured'	=>	'boolean',
	];


	public function setAttributeName($value){
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = Str::slug($value);
	}

	public function brand(){
		// $products->brand
		return $this->belongsTo(Brand::class);
	}

	public function images(){
		// $product->images
		return $this->hasMany(ProductImage::class);
	}
}
