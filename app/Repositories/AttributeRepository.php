<?php
namespace App\Repositories;

use App\Contracts\AttributeContract;
use App\Models\Attribute;

Class AttributeRepository extends BaseRepository implements AttributeContract{

	/**
	* AttributeRepository Constructor
	* @param Attribute $model
	*/
	public function __construct(Attribute $model){
		\Log::info("Req=AttributeRepository@__constrcut called");
		$this->model = $model;
	}


	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listAttributes(string $order = 'id', string $sort = 'desc',array $columns = ['*']){
		\Log::info("Req=Repositories/AttributeContract@listAttributes called");
		return $this->all($columns, $order, $sort);
	}


}