<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

	$categories = [

		'Branded Foods', 'Households', 'Veggies & Fruits', 'Kitchen', 'Brand & Bakery'
	];
	foreach($categories as $category){

		return [
			'name'			=>	trim(strtolower($category)),
			'description'	=>	$faker->realText(100),
			'parent_id'		=>	1,
			'menu'			=>	1,
		];

		$this->command->info('Inserted'. count($categories). 'records');
	}
	
});
