<?php



namespace copol\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class ProductProviderRepo {

    public function addProductProvider($products, $provider, $amount)
    {


        $productAmounts = array_combine($products["productos"], $amount["amount"]);



        $date = new DateTime;
        foreach ($productAmounts as $products => $amount)
        {


            DB::table('product_provider')->insert([


                'provider_id' => $provider->id,
                'product_id'  => $products,
                'amount'      => $amount,
                'created_at'  => $date,
                'updated_at'  => $date


            ]);


        }


    }


} 