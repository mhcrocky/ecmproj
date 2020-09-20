<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{


    protected $data = [
        'Colthing'  =>  ["woman Shoes", 'Mens\'s Shirt'],
        'Handy'     =>  ['Smartphones', 'Smartwatches']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach($this->data as $cat => $subCats){
            $id = Category::create(['name' => $cat])->id;

            foreach ($subCats as $subCat) {

                Category::create([
                    'name'          =>  $subCat,
                    'parent_id'     =>  $id,
                    'description'   =>  $faker->realText(100),
                    'menu'          =>  1,
                ]);
            }

        }
        $this->command->info('Inserted '. count($this->data).' records');
        // Category::create([
        // 	'name'			=>	'Root',
        // 	'description'	=>	'This is the root category, don\'t delete this one',
        // 	'parent_id'		=>	null,
        // 	'menu'			=>	0,
        // ]);

        // factory('App\Models\Category')->create();

    }
}
