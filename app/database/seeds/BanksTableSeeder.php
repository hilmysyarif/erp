<?php



class BanksTableSeeder extends Seeder {

    public function run()
    {



        Bank::create([


            'name' => "Santander",
            'company_id'=>'1'



        ]);


    }
}