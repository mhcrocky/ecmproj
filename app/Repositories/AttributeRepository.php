<?php
namespace App\Repositories;

use App\Contracts\AttributeContract;
use App\Models\Attribute;
use Illumiate\Database\QueryException;
use IIluminate\Database\Eloquent\ModelNotFoundException;

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

	
	/**
	* @param array $params
	* @return mixed
	*/
	public function createAttribute(array $params){
		\Log::info("Req=Repositories\AttributeRepository@createAttribute called");
		try{
			$collection = collect($params);
			$is_filterable = $collection->has('is_filterable') ? 1 : 0;
			$is_required = $collection->has('is_required') ? 1 : 0;
			$merge = $collection->merge(compact('is_filterable', 'is_required'));
			// dd($merge);
			$arrtibute = new Attribute($merge->all());
			$arrtibute->save();
			return $arrtibute;
		}catch(QueryException $ex){
			throw new InvalidArgumentException($ex->getMessage());
		}
	}

	/**
	* @param int $id
	* @return mixed
	*/
	public function findAttributeById($id){
		\Log::info("Req=Repositories\AttributeRepository@findAttributeById called");
		try{
			return $this->findOneOrFail($id);
		}catch(ModelNotFoundException $e){
			throw new ModelNotFoundException($e);
		}
	}

	/**
	* @param array $params
	* @return mixed
	*/
	public function updateAttribute(array $params){
		\Log::info("Req=Repositories/AttributeRepository@updateAttribute called");
		try {
			$attribute = $this->findAttributeById($params['id']);
			$collect = collect($params)->except('_token');
			$is_filterable = $collect->has('is_filterable') ? 1 : 0;
			$is_required = $collect->has('is_required') ? 1 : 0;
			$merge = $collect->merge(compact('is_filterable', 'is_required'));
			// dd($merge);
			$attribute->update($merge->all());
			return $attribute;
		} catch (Exception $e) {
			throw new $e->getMessage();
		}
		
	}

	/**
	* @param int $id
	*/
	public function deleteAttribute($id){
		\Log::info("Req=Repositories/AttributeRepository@deleteAttribute called");
		$attribute = $this->findOneOrFail($id);
		$attribute->delete();
		return $attribute;
	}



}