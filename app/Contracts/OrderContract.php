<?php
namespace App\Contracts;

interface OrderContract{

	/** 
	* @param array string
	* @return mixed
	*/
	public function storeOrderDetails($params);
}