<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\AttributeContract;

class AttributeController extends BaseController
{
	protected $attributeRepository;

	public function __construct(AttributeContract $attributeRepository){
		$this->attributeRepository = $attributeRepository;
	}

    /**
    * @return attribute value
    */
    public function index(){
    	\Log::info("Req=AttributeController@index called");
    	$this->setPageTitle('Attributes', 'Attributes Page');
    	$categories = $this->attributeRepository->listAttributes();
    	return view('admin.attributes.index', compact('categories'));
    }
}
