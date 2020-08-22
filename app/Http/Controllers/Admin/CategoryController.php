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

	/**
	* @param Request $request
	* @return \IIluminate\Http\RedirectResponse
	* @throws \Illuminate\Validation\ValidationException
	*/
	public function store(Request $request){
		\Log::info("Req=CategoryController@store Called");
		$this->validate($request, [
			'name'		=>	'required|max:191',
			'parent_id'	=>	'required|not_in:0',
			'image'		=>	'required|mimes:jpg,jpeg,png|max:1000'
		]);

		$params = $request->except('_token');
		
		$category = $this->categoryRepository->createCategory($params);
		if(!$category){
			return $this->responseRedirectBack('Error occurred while creating category', 'error', true, true);
		}

		return $this->responseRedirect('admin.categories.index', 'Category added successfully', 'success', false, false);
	}
}
