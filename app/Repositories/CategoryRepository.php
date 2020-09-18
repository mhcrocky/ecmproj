<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Contracts\CategoryContract;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;

class CategoryRepository extends BaseRepository implements CategoryContract{

	use UploadAble;

	/**
	* CategoryRepository constructor
	* @param Category $model
	*/
	public function __construct(Category $model){
		\Log::info("Req=Repositories/CategoryRepository@__construct called");
		Parent::__construct($model);
		$this->model = $model;
	}

	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listCategories(string $order = 'id', string $sort ='desc', array $columns = ['*']){
		\Log::info("Req=Repositories/CategoryRepository@listCategories Called");
		return $this->all($columns, $order, $sort);
	}

	/**
	* @param int $id
	* @return mixed
	* @throws ModelNotFoundException
	*/
	public function findCategoryById(int $id){
		\Log::info("Req=Repositories/CategoryRepository@findCategoryById Called");
		try{
			return $this->findOneOrFail($id);
		}catch (ModelNotFoundException $e){
			throw new ModelNotFoundException($e);
		}
	}

	/**
	* @param array $params
	* @return Category|mixed
	*/
	public function createCategory(array $params){
		\Log::info("Req=Repositories/CategoryRepository@createCategory Called");
		try{
			$collection = collect($params);
			$image = null;

			if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
				$image = $this->uploadOne($params['image'], 'categories');
			}

			$featured = $collection->has('featured') ? 1 : 0;
			$menu = $collection->has('menu') ? 1 : 0;

			$merge = $collection->merge(compact('menu', 'image', 'featured'));
			$category = new Category($merge->all());
			$category->save();
			return $category;
		}catch(QueryException $exception){
			throw new InvalidArgumentException($exception->getMessage());
			
		}
	}

	/**
	* @param array $params
	* @return mixed
	*/
	public function updateCategory(array $params){
		\Log::info("Req=Repositories/CategoryRepository@updateCategory Called");
		$category = $this->findCategoryById($params['id']);

		$collection = collect($params)->except('_token');
		$image = $category->image;

		if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
			if($category->image != null){
				$this->deleteOne($category->image);
			}
			$image = $this->uploadOne($params['image'], 'categories');
		}

		$featured = $collection->has('featured') ? 1 : 0;
		$menu = $collection->has('menu') ? 1 : 0;
		$merge = $collection->merge(compact('menu', 'image', 'featured'));
		$category->update($merge->all());

		return $category;
	}

	/**
	* @param int $id
	* @return bool|mixed
	*/
	public function deleteCategory($id){
		\Log::info("Req=CategoryRepository@deleteCategory Called");
		$category = $this->findCategoryById($id);
		if($category->name != null){
			$this->deleteOne($category->image);
		}

		$category->delete();

		return $category;
	}


	/**
	* @return mixed
	*/
	public function treeList(){
		\Log::info("Req=Repositories/CategoryRepository@treeList Called");
		return Category::orderByRaw('-name ASC')
		->get()
		->nest()
		->listsFlattened('name'); // other plugins
	}

	/**
	* @param $slug
	* @return mixed
	*/
	public function findBySlug($slug){
		\Log::info("Req=Repositories/CategoryRepository@findBySlug Called");
		return Category::with('products')
		->where('slug', $slug)
		->where('menu', 1)
		->first();
	}
}
