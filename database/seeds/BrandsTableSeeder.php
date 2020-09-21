<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

    	// $faker = Faker::create();

    	factory(Brand::class, 5)->create();
        // factory(Task::class, 1000)->create();


    }
}
