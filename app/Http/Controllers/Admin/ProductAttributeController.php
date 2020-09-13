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
		\Log::info("Req=ProductAttributeController@loadAttributes called");
		$attributes = Attribute::all();
		return response()->json($attributes);
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function productAttributes(Request $request){
		\Log::info("Req=ProductAttributeController@productAttributes called");
		$attribute = Attribute::findOrFail($request->id);
		return response()->json($attribute);
	}
}
