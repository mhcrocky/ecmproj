<?php
namespace App\Contracts;

/**
* Interface CategoryContract
* @package App\Contracts
*/
interface CategoryContract{
	
	/**
	* @param array $columns
	* @param string $order
	* @param string $sort
	* @return mixed
	*/
	public function listCategories(array $columns = ['*'], string $order = 'id', string $sort = 'desc');

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