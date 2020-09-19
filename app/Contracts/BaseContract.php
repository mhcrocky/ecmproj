<?php
namespace App\Contracts;

interface BaseContract{

	/**
	* Create a model instance 
	* @param array attributes
	* @return mixed
	*/
	public function create(array $attribute);

	/**
	* Update a model instance
	* @param array $attributes
	* @param int $id
	* @return  mixed
	*/
	public function update(array $attributes, int $id);

	/**
	* Return all models rows
	* @param array $columns
	* @param string orderBy
	* @param string sortBy
	* @return mixed
	*/
	public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc');

	/**
	* Find one by id
	* @param int id
	* @return mixed
	*/
	public function find(int $id);

	/**
	* FindOne by id or Failed
	* @param int $id
	* @return mixed
	*/
	public function findOneOrFail(int $id);

	/** 
	* Find based on different columns
	* @param array data
	* @return mixed
	*/
	public function findBy(array $data);

	/**
	* Find one based on a different column or through exception
	* @param array $data
	* @return mixed
	*/
	public function findOneByOrFail(array $data);

	/**
	* Delete one by Id
	* @param int $id
	* @return mixed
	*/
	public function delete(int $id);

}