<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{


	protected $data = [
		'Pizza'         =>  ["Cheesy Bites Pizza", 'Pizza Barcelona', 'Pizza Salami', 'Roll Pizza', 'Mushroom chicken pizza'],
		'Burger'        =>  ['Chicken Burger', 'Maxican Burger', 'Maxican club Burger', 'Maxican Little Burger'],
		'Chicken'       =>  ['Chicken Sausage', 'Chicken Nuggets', 'Spicy Chicken', 'Crispy Chicken', 'Chicken Breast'],
		'Cake'          =>  ['Cherry Cake', 'Red Velvet Cake','White Forest Cake', 'Vanilla Cake', 'Black Forest Cake'],
		'Drink'         =>  ['Chocolate Milk', 'Gold Coffee', 'Green mango Cooler', 'Lemon  Shake', 'Stawbarry Shake']

	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


    	Category::create([
    		'name'          =>  'Root',
    		'description'   =>  'This is the root category, don\'t delete this one',
    		'parent_id'     =>  null,
    		'menu'          =>  0,
    	]);

    	foreach($this->data as $cat => $subCats){
    		$id = Category::create([
    			'name'      => $cat,
    			'parent_id' => 1
    		])->id;

    		$this->command->info(date('Y-m-d H:i:s'). ": Category Name = ".$cat." created");

    		foreach ($subCats as $subCat) {

    			Category::create([
    				'name'          =>  $subCat,
    				'parent_id'     =>  $id,
    				'description'   =>  $faker->realText(100),
    				'menu'          =>  1,
    			]);

    			$this->command->info(date('Y-m-d H:i:s'). ": Sub Category = ".$subCat." created");

    		}

    	}

        // factory('App\Models\Category')->create();

    }
}
