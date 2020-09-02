<?php
namespace App\Repositories;

class ProductRepository extends BaseRepository implements ProductContact{

	
	public function __construct(Product $model){
		parent::__construct($model);
		$this->model = $model;
	}
	public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']){

	}
}
