<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {



        User::create([


            'email'       => "cabrerabywaters@gmail.com",
            'name'        => "Ignacio",
            'last_name'   => "Cabrera",
            'password'    => "123",
            'provider_id' => "0",
            'company_id' => "0",
            'role_id' => "1"


        ]);


        User::create([


            'email'       => "admin@company.com",
            'name'        => "Ignacio",
            'last_name'   => "Cabrera",
            'password'    => "123",
            'provider_id' => "0",
            'company_id' => "1",
            'role_id' => "0"


        ]);


        User::create([


            'email'       => "admin@provider.com",
            'name'        => "Ignacio",
            'last_name'   => "Cabrera",
            'password'    => "123",
            'provider_id' => "1",
            'company_id' => "0",
            'role_id' => "0"


        ]);
    }


}