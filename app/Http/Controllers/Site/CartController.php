<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller{

	public function getCart(){
		\Log::info("Req=CartController@getCart called");
		return view('site.pages.cart');
	}

	public function removeItem($id){
		\Log::info("Req=CartController@removeItem called");
		Cart::remove($id);
		if(Cart::isEmpty()){
			return redirect('/');
		}
		return redirect()->back()->with('message', 'Item removed from cart successfully.');
	}

	public function clearCart(){
		\Log::info("Req=CartController@clearCart called");
		Cart::clear();
		return redirect('/');
	}

}