<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
	$brands = ['Nestle', 'PepsiCo, Inc', 'Unilever', 'Pran', 'Halal'];
	
	return [
		'name' => $faker->unique()->randomElement($brands)
	];

});
