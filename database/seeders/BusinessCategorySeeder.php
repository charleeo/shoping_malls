<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Baby Wears'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Shoes'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'toys'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Computers'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Phones'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Accessories'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Gadgets'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Food Items'
        ]);
    }
}
