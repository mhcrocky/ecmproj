<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;

class ProductAttributeController extends Controller
{
	/**
	* @return \Illuminate\Http\JsonResponse
	*/
	public function loadAttributes(){
		
		$attributes = Attribute::all();

		return response()->json($attributes);
	}
}
