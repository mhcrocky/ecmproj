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

	public function store(Request $request){
		$this->validate($request, [
			'name' => 'required|max:250',
			'logo' => 'mimes:jpg,jpeg,png|max:1000',
		]);

		$params = $request->except('_token');
		$brand = $this->brandRepositry->createBrand($params);
		if(!$brand){
			return $this->responseRedirectBack('Error occured while creating brand', 'error', true, true);
		}

		return $this->responseRedirect('admin.brands.index', 'Brand added successfully', 'success');
	}

	public function edit($id){
		\Log::info("Req=BrandController@edit called");
		$this->setPageTitle('Brand', 'Edit Brand');
		$brand = $this->brandRepositry->findBrandById($id);

		return view('admin.brands.edit', compact('brand'));
	}


	public function update(Request $request){
		\Log::info("Req=BrandController@update called");
		
		$this->validate($request,[
			'name' => 'required|max:250',
			'logo' => 'mimes:jpeg,jpg,png:max:1000',
		]);

		$params = $request->except('_token');

		$updateBrand = $this->brandRepositry->updateBrand($params);

		if(!$updateBrand){
			return $this->responseRedirectBack('Error occured while updating brand', 'error', true, true);
		}

		return $this->responseRedirect('admin.brands.index', 'Brand has been updated successfully', 'success');
	}

	public function delete($id){
		\Log::info("Req=BrandController@delete called");
		
		$deleteBrand = $this->brandRepositry->deleteBrand($id);

		if(!$deleteBrand){
			return $this->responseRedirectBack('Error occured while deleting brand', 'error', true, true);
		}

		return $this->responseRedirect('admin.brands.index', 'Brand has been deleted successfully', 'success');
	}
}


