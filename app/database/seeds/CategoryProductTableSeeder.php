<?php

class CategoryProductTableSeeder extends Seeder {

    public function run()
    {





        DB::table('category_product')->insert([


            'category_id' => "1",
            'product_id'  => "1"


        ]);

    }
}