<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;

/**
* Class CategoryController
* @package App\Http\Controller\Admin
*/
class CategoryController extends BaseController
{
	use UploadAble;

	/**
	* @var CategoryContract
	*/
	protected $categoryRepository;

	/**
	* CategoryController construct
	* @param CategoryContract $categoryRepository
	*/
	public function __construct(CategoryContract $categoryRepository){
		\Log::info("Req=CategoryController@__construct Called");
		$this->categoryRepository = $categoryRepository;
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function index(){
		\Log::info("Req=CategoryController@index Called");
		$categories = $this->categoryRepository->listCategories();
		$this->setPageTitle('Categories', 'List of all categories');
		return view('admin.categories.index', compact('categories'));
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function create(){
		\Log::info("Req=CategoryController@create Called");
		$categories = $this->categoryRepository->listCategories('id', 'asc');
		$this->setPageTitle('Categories', 'Create Category');
		return view('admin.categories.create', compact('categories'));
	}

	public function store(Request $request){
		\Log::info("Req=CategoryController@store Called");
		$this->validate($request, [
			'name'		=>	'required|max:191',
			'parent_id'	=>	'required|not_in:0',
			'image'		=>	'mimes:jpg,jpeg,png|max:1000'
		]);

		$params = $request->except('_token');
		$params = collect($params);
		// $category = $this->categoryRepository->createCategory($params);
		$featured = $params->has('featured') ? 1 : 0;
		$menu = $params->has('menu') ? 1 : 0;

		if($params->has('image') && $request->file('image') instanceof UploadedFile){
			$image = $this->uploadOne($request->file('image'), 'categories');

		}

		$params = $params->merge(compact('featured','menu', 'image'));

		dd($params);
	}
}
