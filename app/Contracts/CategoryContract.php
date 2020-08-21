<?php
namespace App\Contracts;

/**
* Interface CategoryContract
* @package App\Contracts
*/
interface CategoryContract{
	
	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listCategories(String $order = 'id', string $sort = 'desc', array $columns = ['*']);

	/**
	* @param int $id
	* @return mixed
	*/
	public function findCategoryById(int $id);

	/**
	* @param array $params
	* @return mixed
	*/
	public function createCategory(array $params);

	/**
	* @param array $params
	* @return mixed
	*/
	public function updateCategory(array $params);
	
	/**
	* @param int $id
	* @return mixed
	*/
	public function deleteCategory($id);

}