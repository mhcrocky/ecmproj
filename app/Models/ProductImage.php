<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $table = 'product_images';

	protected $fillable = ['product_id', 'thumbnail', 'full'];

	protected $casts = [
		'product_id' => 'integer',
	];

	public function product(){
    	// $images->product
		return $this->belongsTo(Product::class);
	}
}
