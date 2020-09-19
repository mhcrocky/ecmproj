<?php
namespace App\Contracts;

interface BrandContract{
	
	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

	/**
	* @param array $params
	*/
	public function createBrand(array $params);

	/**
	* @param int $id
	* @return mixed
	*/
	public function findBrandById(int $id);

	/**
	* @param array $params
	*/
	public function updateBrand(array $params);

	/**
	* @param int $id
	*/
	public function deleteBrand(int $id);
}