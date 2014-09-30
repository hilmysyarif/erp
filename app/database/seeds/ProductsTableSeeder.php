<?php

class ProductsTableSeeder extends Seeder {

    public function run()
    {



        Product::create([

            'name'        => "Limón Granel",
            'description' => "Limón Granel",
            'img_url'     => "1410107897-original-limon.png",
            'rz320_img_url' =>"1410107897-320-limon.png",
            'rzTn_img_url' =>"1410107897-Tn-limon.png",



        ]);
        Product::create([

            'name'        => "Naranja Granel",
            'description' => "Naranja Granel",
            'img_url'     => "1410228671-original-naranja.png",
            'rz320_img_url' =>"1410228671-320-naranja.png",
            'rzTn_img_url' =>"1410228671-Tn-naranja.png",



        ]);




    }
}