<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;

class BaseController extends Controller
{
    use FlashMessages;

    /**
    * @var null
    */
    protected $data = null;

    
    /**
    * @param $title
    * @param $subTitle
    */
    protected function setPageTitle($title, $subTitle){
        \Log::info("Req=BaseController@setPageTitle called");
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }

    
    /**
    * @param int $errorCode
    * @param null $message
    * @return \Illuminate\Http\Response
    */
    protected function showErrorPage($errorCode = 404, $message = null){
        \Log::info("Req=BaseController@showErrorPage called");
        $data['message'] = $message;
        return response()->view('errors.'.$errorCode, $data, $errorCode);

    }


    /**
    * @param bool $error
    * @param int $responseCode
    * @param array $message
    * @param null $data
    * @return \Illuminate\Http\JsonResponse
    */
    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null){
        \Log::info("Req=BaseController@responseJson called");
        return response()->json([
          'error'			=> $error,
          'response_code'	=> $responseCode,
          'message' 		=> $message,
          'data' 			=> $data
      ]);
    }


    /**
    * @param $route
    * @param $message
    * @param string $type
    * @param bool $error
    * @param bool $withOldInputWhenError
    * @return \Illuminate\Http\RedirectResponse
    */
    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false){
        \Log::info("Req=BaseController@responseRedirect called");
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();
    	// Errors with input value -->
        if($error && $withOldInputWhenError){
          return redirect()->back()->withInput();
      }
      return redirect()->route($route);
  }

  
    /**
    * @param $message
    * @param string $type
    * @param bool $error
    * @param bool $withOldIinputWhenError
    * @return \Illuminate\Http\RedirectResponse
    */
    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldIinputWhenError = false){
        \Log::info("Req=BaseController@responseRedirectBack called");
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();
        return redirect()->back();
    }

}
