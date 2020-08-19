<?php
namespace App\Traits;

trails UploadAble{

	/**
	* @param UploadedFile $file
	* @param null $folder
	* @param string $disk
	* @param null $filename
	* @return false|string
	*/
	public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null){

		$name = !is_null($filename) ? $filename : Str::random(25);

		return $file->storeAs(
			$folder,
			$name.".".$file->getClientOriginalExtention(),
			$disk
		);
	}

	/**
	* @param null $path
	* @param string $disk
	*/
	public function deleteOne($path =null, $disk = 'public'){
		Storage::disk($disk)->delete($path);
	}

}
