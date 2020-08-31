<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\BrandContract;

class BrandController extends BaseController
{
	protected $brandRepositry;
	
	public function __construct(BrandContract $brandRepositry){
		$this->brandRepositry = $brandRepositry;

	}
	public function index(){
		\Log::info("Req=BaseController@index called");

		$this->setPageTitle('Brands', 'List of all brands');

		$brands = $this->brandRepositry->listBrands();
		return view('admin.brands.index', compact('brands'));
	}

	public function create(){
		\Log::info("Req=BaseController@create called");
		$this->setPageTitle('Brands', 'Create Brand');
		return view('admin.brands.create');
	}
}
