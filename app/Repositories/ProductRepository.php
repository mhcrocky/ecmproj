<?php
namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductRepository extends BaseRepository implements ProductContract{

	/**
	* ProductRepository Constructor
	* @param Product $model
	*/
	public function __construct(Product $model){
		parent::__construct($model);
		$this->model = $model;
	}
	

	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']){
		return $this->all($columns, $order, $sort);	
	}

	/**
	* @param array $params
	* @return products|mixed
	*/
	public function createProduct(array $params){

	}



	
}
