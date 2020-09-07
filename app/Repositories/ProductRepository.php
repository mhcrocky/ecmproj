<?php
namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

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
		try {
			
			$colleciton = collect($params);

			$status = $colleciton->has('status') ? 1 : 0;
			$featured = $colleciton->has('featured') ? 1 : 0;
			$merge = $colleciton->merge(compact('status', 'featured'));

			$product = new Product($merge->all());
			$product->save();


			if($colleciton->has('categories')){
				$product->categories()->sync($params['categories']);
			}

			return $product;
			
		} catch (QueryException $e) {
			throw new InvalidArgumentException($e->getMessage());
		}
	}



	
}
