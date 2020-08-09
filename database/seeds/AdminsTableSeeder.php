k<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Admin::create([
        	'name' => $faker->name,
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('password')
        ]);
    }
}
