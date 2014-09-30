<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {



        Category::create([


            'name' => "Frutas",
            'img'  => "frutas.png"


        ]);


    }
}