<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\CategoryContract;

/**
* Class CategoryController
* @package App\Http\Controller\Admin
*/
class CategoryController extends BaseController
{

	/**
	* @var CategoryContract
	*/
	protected $categoryRepository;

	/**
	* CategoryController construct
	* @param CategoryContract $categoryRepository
	*/
	public function __construct(CategoryContract $categoryRepository){
		$this->categoryRepository = $categoryRepository;
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function index(){
		$categories = $this->categoryRepository->listCategories();
		$this->setPageTitle('Categories', 'List of all categories');
		return view('admin.categories.index', compact('categories'));
	}

	/**
	* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function create(){
		$categories = $this->categoryRepository->listCategories('id', 'asc');
		$this->setPageTitle('Categories', 'Create Category');
		return view('admin.categories.create', compact('categories'));
	}
}
