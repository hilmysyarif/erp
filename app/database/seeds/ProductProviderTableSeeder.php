<?php

class ProductProviderTableSeeder extends Seeder {

    public function run()
    {




        DB::table('product_provider')->insert([


            'provider_id' => "1",
            'product_id'  => "1",

        ]);
        DB::table('product_provider')->insert([


            'provider_id' => "1",
            'product_id'  => "2",

        ]);



    }
}