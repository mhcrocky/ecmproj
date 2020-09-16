<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use Illuminate\Http\Request;

class ProductController extends Controller{

	protected $productRepository;
	protected $attributeRepository;

	public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository){
		$this->productRepository = $productRepository;
		$this->attributeRepository = $attributeRepository;
	}

	public function show($slug){
		\Log::info("Req=ProductController@show called");
		$product = $this->productRepository->findProductBySlug($slug);
		$attributes = $this->attributeRepository->listAttributes();
		return view('site.pages.product', compact('product', 'attributes'));
	}

	public function addToCart(Request $reqeust){
		$product = $this->productRepository->findProductById($request->input('productId'));

	}

}