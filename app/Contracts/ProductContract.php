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
	* @return mixed
	*/
	public function createProduct(array $params);

	/**
	 * @param int $id
	 */
	public function deleteProduct(int $id);

	/**
	 * @param array $params
	 * @return mixed
	 */
	public function updateProduct(array $params);
	
}