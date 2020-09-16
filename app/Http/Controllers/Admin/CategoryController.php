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
		\Log::info("Req=CategoryController@__construct called");
		$this->categoryRepository = $categoryRepository;
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function index(){
		\Log::info("Req=CategoryController@index called");
		$categories = $this->categoryRepository->listCategories();
		$this->setPageTitle('Categories', 'List of all categories');
		return view('admin.categories.index', compact('categories'));
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function create(){
		\Log::info("Req=CategoryController@create called");
		// $categories = $this->categoryRepository->listCategories('id', 'asc');
		$categories = $this->categoryRepository->treeList();
		$this->setPageTitle('Categories', 'Create Category');
		return view('admin.categories.create', compact('categories'));
	}

	/**
	* @param Request $request
	* @return \IIluminate\Http\RedirectResponse
	* @throws \Illuminate\Validation\ValidationException
	*/
	public function store(Request $request){
		\Log::info("Req=CategoryController@store called");
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

	
	/**
	* @param int $id
	* @return \Illuminate\Contracts\View\Factory|\Illumniate\View\View
	*/
	public function edit($id){
		\Log::info("Req=CategoryController@edit called");
		$targetCategory = $this->categoryRepository->findCategoryById($id);
		// $categories = $this->categoryRepository->listCategories();
		$categories = $this->categoryRepository->treeList();
		$this->setPageTitle('Categories', 'Edit Category : '. $targetCategory->name);
		return view('admin.categories.edit', compact('targetCategory', 'categories'));
	}

	/**
	* @param Request $request
	* @return \Illuminate\Http\RedirectResponse
	* @throws \Illuminate\Validate\ValidateException
	*/
	public function update(Request $request){
		\Log::info("Req=CategoryController@update called");
		$this->validate($request,[
			'name'		=>	'required|max:191',
			'parent_id'	=>	'required|not_in:0',
			'image'		=> 	'mimes:jpeg,jpg,png|max:1000'
		]);

		$params = $request->except('_token');
		$updateCategory = $this->categoryRepository->updateCategory($params);

		if(!$updateCategory){
			return $this->responseRedirectBack('Error occured while update category', 'error', true, true);
		}

		return $this->responseRedirect('admin.categories.index', 'Category updated successfully', 'success');

	}

	public function delete($id){
		\Log::info("Req=CategoryController@delete called");
		$deleteCategory = $this->categoryRepository->deleteCategory($id);
		if(!$deleteCategory){
			return $this->responseRedirectBack('Error occurred while deleting categories', 'error', true, true);
		}

		return $this->responseRedirect('admin.categories.index', 'Category deleted successfully', 'success');
	}
}
