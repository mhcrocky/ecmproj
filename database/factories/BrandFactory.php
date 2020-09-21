<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
	$brands = ['Nestle', 'PepsiCo, Inc', 'Unilever', 'Pran', 'Halal'];

    	// Brand::create([
    	// 	'name' 	=>	$faker->randomElement($brands),
    	// ]);
	return [
		'name' => $faker->unique()->randomElement($brands)
	];
});
