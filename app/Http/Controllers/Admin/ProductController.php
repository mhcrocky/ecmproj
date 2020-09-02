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
			'price'			=> 'required|regex:/^d+(\.\d{1,2})?$/',
			'special_price'	=> 'regex:/^d+(\.\d{1,2})?$/',
			'quantity'		=>	'required|numeric'

		]);
	}
}
