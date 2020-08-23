<?php
namespace App\Contracts;

interface AttributeContract{

	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listAttributes(string $order = 'id', string $sort = 'desc',array $columns = ['*']);
}