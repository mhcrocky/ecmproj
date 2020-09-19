<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Contracts\OrderContract;
use Illuminate\Http\Request;


class CheckoutController extends Controller{

	protected $orderRepository;

	public function __construct(OrderContract $orderRepository){
		\Log::info("Req=CheckoutController@__construct called");
		$this->orderRepository = $orderRepository;
	}

	public function getCheckout(){
		\Log::info("Req=CheckoutController@getCheckout called");
		return view('site.pages.checkout');
	}

	public function placeOrder(Request $request){
		\Log::info("Req=CheckoutController@placeOrder called");
		$order = $this->orderRepository->storeOrderDetails($request->all());
		dd($order);
	}
}