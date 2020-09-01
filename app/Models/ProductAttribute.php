<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
	protected $table = 'product_attributes';

	protected $fillable = [
		'quantity', 'price', 'product_id'
	];

	public function product(){
    	// $attributes->product
		return $this->belongsTo(Product::class);
	}

	public function attributesValues(){
		return $this->belongsToMany(AttributeValue::class);
	}
}
