<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;

class ProductController extends BaseController
{
	public function __construct(ProductContract $productRepository){
		\Log::info("Req=ProductController@__construct called");
		$this->productRepository = $productRepository;
	}

	public function index(){
		\Log::info("Req=ProductController@index called");
		$this->setPageTitle('Product', 'List All Product');
		$products = $this->productRepository->listProducts();
		return view('admin.products.index', compact('products'));
	}
}
