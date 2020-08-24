<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\AttributeContract;

class AttributeValueController extends Controller
{
	protected $attributeRepository;

	public function __construct(AttributeContract $attributeRepository){
		$this->attributeRepository = $attributeRepository;
	}

	public function getValue(Request $request){
		$attributeId = $request->input('id');
		$attribute = $this->attributeRepository->findAttributeById($attributeId);
		$values = $attribute->values();
		return response()->json($values);
	}

}
