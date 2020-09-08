<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;

class ProductController extends BaseController
{
	/**
	* @var $productRepository;
	*/
	protected $productRepository;

	/**
	* @var $brandRepository
	*/
	protected $brandRepository;

	/**
	* @var $categoryRepository
	*/
	protected $categoryRepository;

	/**
	* ProductController Construct
	* @param ProductContract $productRepository
	*/
	public function __construct(ProductContract $productRepository, BrandContract $brandRepository, CategoryContract $categoryRepository){
		\Log::info("Req=ProductController@__construct called");
		$this->productRepository = $productRepository;
		$this->brandRepository = $brandRepository;
		$this->categoryRepository = $categoryRepository;
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|Illuminate\View\View
	*/
	public function index(){
		\Log::info("Req=ProductController@index called");
		$this->setPageTitle('Product', 'List All Product');
		$products = $this->productRepository->listProducts();
		return view('admin.products.index', compact('products'));
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|Illumiate\View\View
	*/
	public function create(){
		\Log::info("Req=ProductController@create called");
		$this->setPageTitle('Product', 'Create Product');
		$brands = $this->brandRepository->listBrands();
		$categories = $this->categoryRepository->listCategories();
		return view('admin.products.form', compact('brands', 'categories'));
	}


	/**
	* @param Request $reqest
	*/
	public function store(Request $request){
		\Log::info("Req=ProductController@store called");

		$this->validate($request,[
			'name'			=> 'required|max:255',
			'sku'			=> 'required',
			'brand_id'		=> 'required|not_in:0',
			'price'			=> 'regex:/^\d+(\.\d{1,2})?$/|required',
			'special_price'	=> 'regex:/^\d+(\.\d{1,2})?$/',
			'quantity'		=>	'required|numeric'

		]);

		$params = $request->except('_token');

		$createProduct = $this->productRepository->createProduct($params);

		if(!$createProduct){
			return $this->responseRedirectBack('Error occured while creating product', 'error', true, true);		
		}

		return $this->responseRedirect('admin.products.index', 'Product added successfully.', 'success');
	}


	public function delete($id){
		\Log::info("Req=ProductController@delete called");
		$deleteProduct = $this->productRepository->deleteProduct($id);

		if(!$deleteProduct){
			return $this->responseRedirectBack('Error occured while deleting product', 'error', true, true);
		}

		return $this->responseRedirect('admin.products.index', 'Product has been deleted successfully', 'success');
	}
}
