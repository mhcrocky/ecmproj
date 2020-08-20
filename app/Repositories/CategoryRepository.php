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
		Parent::__construct($model);
		$this->model = $model;
	}

	public function listCategories(String $order = 'id', string $sort ='desc', array $columns = ['*']){
		return $this->all($columns, $order, $sort);
	}

	public function findCategoryById(int $id){
		try{
			return $this->findOneOrFail($id);
		}catch (ModelNotFoundException $e){
			throw new ModelNotFoundException($e);
		}
	}

	public function createCategory(array $params){
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

}
