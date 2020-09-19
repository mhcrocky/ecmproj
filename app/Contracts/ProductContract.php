<?php
namespace App\Contracts;

interface ProductContract{

	/**
	* @param string order
	* @param string $sort
	* @param array $column
	* @return mixed
	*/
	public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

	/**
	* @param array $params
	*/
	public function createProduct(array $params);

	/**
	 * @param int $id
	 */
	public function deleteProduct(int $id);

	/**
	 * @param array $params
	 */
	public function updateProduct(array $params);

	/**
	* @param $slug
	* @return mixed
	*/
	public function findProductBySlug($slug);
	
}