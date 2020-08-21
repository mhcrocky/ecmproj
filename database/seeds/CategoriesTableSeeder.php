<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name'			=>	'Root',
        	'description'	=>	'This is the root category, don\'t delete this one',
        	'parent_id'		=>	null,
        	'menu'			=>	0,
        ]);

        factory('App\Models\Category',10)->create();
    }
}
