<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Contracts\BrandContract;
use App\Models\Brand;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrandRepository extends BaseRepository implements BrandContract{

	use UploadAble;

	public function __construct(Brand $model){
		\Log::info("Req=Repositories/BrandRepository@__construct called");
		parent::__construct($model);
		$this->model = $model;
	}

	public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']) {
		\Log::info("Req=Repositories/BrandRepository@listBrands called");

		return $this->all($columns, $order, $sort);
	}

	public function createBrand(array $params){
		\Log::info("Req=Repositories/BrandRepository@createBrand called");

		try {
			$collection = collect($params);
			
			$logo = null;

			if($collection->has('logo') && ($params['logo'] instanceof UploadedFile )){
				$logo = $this->uploadOne($params['logo'], 'brands');
			}

			$merge = $collection->merge(compact('logo'));
			$brand = new Brand($merge->all());
			$brand->save();
			return $brand;

		} catch (QueryException $e) {
			throw new InvalidArgumentException($e->getMessage());
			
		}
	}


	public function findBrandById($id){
		\Log::info("Req=Repositories/BrandRepository@findBrandById called");

		try {
			return $this->findOneOrFail($id);
		} catch (ModelNotFoundException $e) {
			throw new ModelNotFoundException($e);
		}
	}

	public function updateBrand($params){
		\Log::info("Req=Repositories/BrandRepository@updateBrand called");
		$brand = $this->findBrandById($params['id']);
		$collection = collect($params)->except('_token');

		if($collection->has('logo') && ($params['logo'] instanceof UploadedFile)){
			if($brand->logo != null){
				$this->deleteOne($brand->logo);
			}
			$logo = $this->uploadOne($params['logo'], 'brands');
		}
		$merge = $collection->merge(compact('logo'));
		$brand->update($merge->all());
		return $brand;

	}

	public function deleteBrand($id){
		\Log::info("Req=Repositories/BrandRepository@deleteBrand called");
		$brand = $this->findBrandById($id);
		if($brand->logo != null){
			$this->deleteOne($brand->logo);
		}
		$brand->delete();

		return $brand;
	}
}
