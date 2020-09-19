<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use Illuminate\Http\Request;
use Cart;

class ProductController extends Controller{

	protected $productRepository;
	protected $attributeRepository;

	public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository){
		\Log::info("Req=ProductController@__construct called");
		$this->productRepository = $productRepository;
		$this->attributeRepository = $attributeRepository;
	}

	public function show($slug){
		\Log::info("Req=ProductController@show called");
		$product = $this->productRepository->findProductBySlug($slug);
		$attributes = $this->attributeRepository->listAttributes();
		return view('site.pages.product', compact('product', 'attributes'));
	}

	public function addToCart(Request $request){
		\Log::info("Req=ProductController@addToCart called");
		$product = $this->productRepository->findProductById($request->input('productId'));
		$options = $request->except('_token', 'productId', 'price', 'qty');

		Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
		return redirect()->back()->with('message', 'Item added to cart successfully');

	}

}