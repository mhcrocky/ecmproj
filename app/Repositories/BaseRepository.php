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
		$this->model = $model;
	}
	
	/**
	* @param array attributes
	* @return mixed
	*/
	public function create(array $attributes){
		return $this->model->create($attributes);
	}
	
	/**
	* @param array attributes
	* @param int id
	* @return bool
	*/
	public function upate(array $attributes, int $id) : bool{
		return $this->find($id)->update($attributes);
	}

	/**
	* @param array $colums
	* @param string $orderBy
	* @param string $sortBy
	* @return mixed
	*/
	public function all($coloums = array(*), string $orderBy = 'id', string $sortBy = 'asc'){
		return $this->model->orderBy($orderBy, $sortBy)->get($coloums);
	}


	/**
	* @param int $id
	* @return mixed
	*/
	public function findOneOrFail(int $id){
		return $this->model->findOrFail($id);
	}

	/**
	* @param array $data
	* @return mixed
	*/
	public function findOneBy(array $data){
		return $this->model->where($data)->all();
	}

	/**
	* @param array $data
	* @return mixed
	* @throws Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function findOneByOrFail(array $data){
		return $this->model->where($data)->firstOrFail();
	}

	/**
	* @param int $id
	* @return bool
	*/
	public function delete(int $id) : bool{
		return $this->model->find($id)->delete();
	}

}