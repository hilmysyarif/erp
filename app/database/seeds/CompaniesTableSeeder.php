<?php

class CompaniesTableSeeder extends Seeder {

    public function run()
    {



        Company::create([


            'rut'              => "9-1",
            'adress'           => "Dirección",
            'city'             => "Santiago",
            'location'         => "San Miguel",
            'phone_number'     => "5544525",

            'fancy_name'     => "Jumbo",
            'description'      => "Comercializado de Productos Jumbo",


        ]);

    }
}