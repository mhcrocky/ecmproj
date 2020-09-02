<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\BrandContract;

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
	* ProductController Construct
	* @param ProductContract $productRepository
	*/
	public function __construct(ProductContract $productRepository, BrandContract $brandRepository){
		\Log::info("Req=ProductController@__construct called");
		$this->productRepository = $productRepository;
		$this->brandRepository = $brandRepository;
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
		$catgories = [];
		return view('admin.products.form', compact('brands'));
	}
}
