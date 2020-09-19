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
	public function listCategories(string $order = 'id', string $sort = 'desc',array $columns = ['*']);
	/**
	* @param int $id
	* @return mixed
	*/
	public function findCategoryById(int $id);

	/**
	* @param array $params
	*/
	public function createCategory(array $params);

	/**
	* @param array $params
	*/
	public function updateCategory(array $params);
	
	/**
	* @param int $id
	*/
	public function deleteCategory($id);

	/**
	* @return mixed
	*/
	public function treeList();

	/**
	* @param $slug
	* @return mixed
	*/
	public function findBySlug($slug);


}