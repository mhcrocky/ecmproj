<?php
namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;


class ProductRepository extends BaseRepository implements ProductContract{

	
	public function __construct(Product $model){
		parent::__construct($model);
		$this->model = $model;
	}
	public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']){

	}
}
