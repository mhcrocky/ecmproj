<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class CartController extends Controller{

	public function getCart(){
		return view('site.pages.cart');
	}

}