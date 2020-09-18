<?php
namespace App\Repositories;

use App\Contracts\OrderContract;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Cart;

class OrderRepository extends BaseRepository implements OrderContract{

	public function __construct(Order $model){
		\Log::info("Req=Repositories/OrderRepository@findBySlug Called");
		parent::__construct($model);
		$this->model = $model;
	}

	public function storeOrderDetails($params){
		\Log::info("Req=Repositories/OrderRepository@storeOrderDetails Called");
		$order = Order::create([
			'order_number' 		=>	'ORD-'.strtoupper(uniqid()),
			'user_id'			=>	Auth()->user()->id,
			'status'			=>	'pending',
			'grand_total'		=> 	Cart::getSubTotal(),
			'item_count'		=>	Cart::getTotalQuantity(),
			'payment_status'	=>	0,
			'payment_method'	=> 	null,
			'first_name'		=>	$params['first_name'],
			'last_name'			=>	$params['last_name'],
			'address'			=> 	$params['address'],
			'city'				=> 	$params['city'],
			'country'			=> 	$params['country'],
			'post_code'			=> 	$params['post_code'],
			'phone_number'		=>	$params['phone_number'],
			'notes'				=>	$params['notes']
		]);

		if($order){

			$items = Cart::getContent();

			foreach($items as $item){
				$product = Product::where('name', $item->name)->first();

				$orderItem = new orderItem([
					'product_id'	=> 	$product->id,
					'quantity'		=>	$item->quantity,
					'price'			=> 	$item->getPriceSum()

				]);


				$order->items()->save($orderItem);
			}
		}

		return $order;
	}
}