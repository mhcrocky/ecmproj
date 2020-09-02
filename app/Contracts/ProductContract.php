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
}