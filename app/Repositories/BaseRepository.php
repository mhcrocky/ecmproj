<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseRepository implements BaseContract{

	protected $model;
	
	/**
	* @param Illuminate\Database\Eloquent\Model
	*/
	public function __construct(Model $model){
		\Log::info("Req=Repositories/BaseRepository@__construct called");
		$this->model = $model;
	}
	
	/**
	* @param array attributes
	* @return mixed
	*/
	public function create(array $attributes){
		\Log::info("Req=Repositories/BaseRepository@update called");
		return $this->model->create($attributes);
	}
	
	/**
	* @param array attributes
	* @param int id
	* @return bool
	*/
	public function upate(array $attributes, int $id) : bool{
		\Log::info("Req=Repositories/BaseRepository@update called");
		return $this->find($id)->update($attributes);
	}

	/**
	* @param array $colums
	* @param string $orderBy
	* @param string $sortBy
	* @return mixed
	*/
	public function all($coloums = array(*), string $orderBy = 'id', string $sortBy = 'asc'){
		\Log::info("Req=Repositories/BaseRepository@all called");
		return $this->model->orderBy($orderBy, $sortBy)->get($coloums);
	}


	/**
	* @param int $id
	* @return mixed
	*/
	public function findOneOrFail(int $id){
		\Log::info("Req=Repositories/BaseRepository@findOneOrFail called");
		return $this->model->findOrFail($id);
	}

	/**
	* @param array $data
	* @return mixed
	*/
	public function findOneBy(array $data){
		\Log::info("Req=Repositories/BaseRepository@findOneBy called");
		return $this->model->where($data)->all();
	}

	/**
	* @param array $data
	* @return mixed
	* @throws Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function findOneByOrFail(array $data){
		\Log::info("Req=Repositories/BaseRepository@findOneByOrFail called");
		return $this->model->where($data)->firstOrFail();
	}

	/**
	* @param int $id
	* @return bool
	*/
	public function delete(int $id) : bool{
		\Log::info("Req=Repositories/BaseRepository@delete called");
		return $this->model->find($id)->delete();
	}

}