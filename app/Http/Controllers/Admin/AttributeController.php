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
    	$this->setPageTitle('Attributes', 'List of all attributes');
    	$attributes = $this->attributeRepository->listAttributes();
    	return view('admin.attributes.index', compact('attributes'));
    }

    /**
    * @return Illuminate\Contracts\View\|Illuminate\View\View
    */
    public function create(){
    	\Log::info("Req=AttributeController@create called");
    	$this->setPageTitle('Attributes', 'Create Attribute');
    	return view('admin.attributes.create');
    }

    /**
    * @param Request $request
    */
    public function store(Request $request){
    	\Log::info("Req=AttributeController@store called");
    	$this->validate($request,[
    		'code'			=>	'required|unique,code',
    		'name'			=>	'required',
    		'frontend_type'	=>	'required|not_in:0'
    	]);
    	$params = $request->except('_token');

    	$attribute = $this->attributeRepository->createAttribute($params);

    	if(!$attribute){
    		return responseRedirectBack('Error occurred while storing attribute', 'error', true, true);
    	}

    	return responseRedirect('admin.attributes.index', 'Attribute added successfully', 'success');
    }
}
