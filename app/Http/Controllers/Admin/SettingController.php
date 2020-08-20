<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class SettingController extends BaseController
{
	use UploadAble;

    /**
    * @return \Illuminate\Contracts\View\Factory | \Illuminate\View\View
    */
    public function index(){
    	\Log::info("Req=Admin/Setting@index called");
    	$this->setPageTitle('Settings', 'Manage Settings');
    	return view('admin.settings.index');
    }


    /**
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function update(Request $request){
    	\Log::info("Req=Admin/Setting@update called");
    	if($request->has('site_logo') && $request->file('site_logo') instanceof UploadedFile){
    		// logo exists -->
    		if(config('settings.site_logo') != null ) {
				$this->deleteOne(config('settings.site_logo'));
			}
			// New logo upload -->
			$logo = $this->uploadOne($request->file('site_logo'), 'img');
			Setting::set('site_logo', $logo);

    	}elseif($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)){
    		if(config('settings.site_favicon') != null){
    			$this->deleteOne(config('settings.site_favicon'));
    		}
    		$favocon = $this->uploadOne($request->file('site_favicon'), 'img');
    		Setting::set('site_favicon', $favocon);
    	}else{
    		$keys = $request->except('_token');
    		
    		foreach($keys as $key => $value){
    			Setting::set($key, $value);
    		}
    	}
    	return $this->responseRedirectBack('Settings updated successfully.', 'success');
    }
}
