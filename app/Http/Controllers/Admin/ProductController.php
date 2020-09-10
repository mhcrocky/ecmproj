<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Http\Requests\ProductFormValidate;
use App\Traits\UploadAble;
use App\Models\ProductImage;

class ProductController extends BaseController
{
	use UploadAble;
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
	public function store(ProductFormValidate $request){
		\Log::info("Req=ProductController@store called");

		// $this->validate($request,[
		// 	'name'			=> 'required|max:255',
		// 	'sku'			=> 'required',
		// 	'brand_id'		=> 'required|not_in:0',
		// 	'price'			=> 'regex:/^\d+(\.\d{1,2})?$/|required',
		// 	'special_price'	=> 'regex:/^\d+(\.\d{1,2})?$/',
		// 	'quantity'		=>	'required|numeric'

		// ]);

		$params = $request->except('_token');

		$createProduct = $this->productRepository->createProduct($params);

		if(!$createProduct){
			return $this->responseRedirectBack('Error occured while creating product', 'error', true, true);		
		}

		return $this->responseRedirect('admin.products.index', 'Product added successfully.', 'success');
	}


	/**
	 * @param int $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id){
		\Log::info("Req=ProductController@edit called");
		$this->setPageTitle('Product', 'Edit Product');

		$product = $this->productRepository->findOneOrFail($id);

		$brands = $this->brandRepository->listBrands();

		$categories = $this->categoryRepository->listCategories();
		
		return view('admin.products.form', compact('product','brands', 'categories'));
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function update(ProductFormValidate $request){
		
		$params = $request->except('_token');
		$updateProduct = $this->productRepository->updateProduct($params);

		if(!$updateProduct){
			return $this->responseRedirectBack('Error occurred while updating product', 'error', true, true);
		}

		return $this->responseRedirect('admin.products.index', 'Product has been updated successfully', 'success');

	}


	/**
	 * @param int $id
	 * @return mixed
	 */
	public function delete($id){
		\Log::info("Req=ProductController@delete called");
		$deleteProduct = $this->productRepository->deleteProduct($id);

		if(!$deleteProduct){
			return $this->responseRedirectBack('Error occured while deleting product', 'error', true, true);
		}

		return $this->responseRedirect('admin.products.index', 'Product has been deleted successfully', 'success');
	}


	/**
	* product image upload
	* @param Request $request
	*/
	public function uploadImage(Request $request){
		\Log::info("Req=ProductController@uploadImage called");

		$product = $this->productRepository->findOneOrFail($request->product_id);

		if($request->has('image')){
			
			$image = $this->uploadOne($request->image, 'products');

			$productImage = new ProductImage([
				'full'	=> $image,
			]);

			$product->images()->save($productImage);

		}

		return response()->json(['status' => 'success']);
	}


	public function deleteImage($id){
		$image = ProductImage::findOrFail($id);

		if($image->full != ''){
			$this->deleteOne($image->full);
		}

		$image->delete();

		return redirect()->back();
	}
}
