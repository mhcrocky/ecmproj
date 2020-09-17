<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;

class CategoryController extends Controller{

	protected $categoryRepository;

	public function __construct(CategoryContract $categoryRepository){
		\Log::info("Req=CategoryController@__construct called");
		$this->categoryRepository = $categoryRepository;
	}

	public function show($slug){
		\Log::info("Req=CategoryController@show called");
		$category = $this->categoryRepository->findBySlug($slug);
		return view('site.pages.category', compact('category'));
	}
}