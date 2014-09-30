<?php

class CompanyProductTableSeeder extends Seeder {

    public function run()
    {



        DB::table('company_product')->insert([


            'company_id' => "1",
            'product_id'  => "1"


        ]);
        DB::table('company_product')->insert([


            'company_id' => "1",
            'product_id'  => "2"


        ]);



    }
}