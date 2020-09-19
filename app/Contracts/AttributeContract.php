<?php

namespace App\Contracts;

interface AttributeContract{

	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

	/**
	* @param array $params
	*/
	public function createAttribute(array $params);

	/**
	* @param int $id
	*/
	public function findAttributeById($id);

	/**
	* @param array $params
	*/
	public function updateAttribute(array $params);

	/**
	* @param int $id
	*/
	public function deleteAttribute($id);

}