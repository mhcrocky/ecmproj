<?php
namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Trails\UploadAble;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class CategoryRepository extends BaseRepository implements CategoryContract{

	use UploadAble;

	/**
	* CategoryRepository constructor
	* @param Category $model
	*/
	public function __construct(Category $model){
		\Log::info("Req=CategoryRepository@__construct called");
		Parent::__construct($model);
		$this->model = $model;
	}

	/**
	* @param string $order
	* @param string $sort
	* @param array $columns
	* @return mixed
	*/
	public function listCategories(String $order = 'id', string $sort ='desc', array $columns = ['*']){
		\Log::info("Req=CategoryRepository@listCategories Called");
		return $this->all($columns, $order, $sort);
	}

	/**
	* @param int $id
	* @return mixed
	* @throws ModelNotFoundException
	*/
	public function findCategoryById(int $id){
		\Log::info("Req=CategoryRepository@findCategoryById Called");
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
		\Log::info("Req=CategoryRepository@createCategory Called");
		try{
			$collection = collect($params);
			$image = null;

			if($collection->has('image') && ($params['image'] instanceof UploadAble)){
				$image = $this->uploadOne($params['image'], 'categories');
			}

			$featured = $collection->has('featured') ? 1 : 0;
			$ModelNotFoundException = $collection->has('menu') ? 1 : 0;

			$merge = $collection->merge(compact('menu', 'image', 'featured'));
			$category = new Category($merge->all());
			$category->save();
			return $category;
		}catch(QueryException $exception){
			throw new InvalidArgumentException($exception->getMessge());
			
		}
	}

	/**
	* @param array $params
	* @return mixed
	*/
	public function updateCategory(array $params){
		\Log::info("Req=CategoryRepository@updateCategory Called");
		$category = $this->findCategoryById($params['id']);

		$collection = collect($params)->except('_token');
		$image = null;

		if($collection->has('image') && ($params['image'] instanceof UploadAble)){
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

}
