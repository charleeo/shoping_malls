<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_category_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
            'product_category_name' => 'Baby Wears'
        ]);
        DB::table('product_category')->insert([
            'product_category_name' => 'Shoes'
        ]);
        DB::table('product_category')->insert([
            'product_category_name' => 'toys'
        ]);

        DB::table('product_category')->insert([
            'product_category_name' => 'Computers'
        ]);

        DB::table('product_category')->insert([
            'product_category_name' => 'Phones'
        ]);

        DB::table('product_category')->insert([
            'product_category_name' => 'Accessories'
        ]);

        DB::table('product_category')->insert([
            'product_category_name' => 'Gadgets'
        ]);

        DB::table('product_category')->insert([
            'product_category_name' => 'Food Items'
        ]);
    }
}
