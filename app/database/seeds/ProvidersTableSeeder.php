<?php

class ProvidersTableSeeder extends Seeder {

    public function run()
    {



        Provider::create([


            'rut'              => "78.238.140-7",
            'adress'           => "America 549",
            'city'             => "Santiago",
            'location'         => "San Miguel",
            'phone_number'     => "5544525",
            'cellphone_number' => "09-93254385",
            'supply_region'    => "Región Metropolitana",
            'fancy_name'     => "Copol Limitada",
            'description'      => "Comercializado de Polietileno Copol Limitada",
            'pyme'             => true


        ]);

    }
}