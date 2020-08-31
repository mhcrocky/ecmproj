<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class BrandController extends BaseController
{
	public function index(){
		\Log::info("Req=BaseController@index called");

		$this->setPageTitle('Brands', 'List of all brands');
		
		return view('admin.brands.index');
	}
}
