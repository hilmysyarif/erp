<?php



namespace copol\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class CompanyProductRepo {

    public function addCompanyProduct($products, $company)
    {


        $productAmounts = $products["productos"];



        $date = new DateTime;
        foreach ($productAmounts as $products)
        {


            DB::table('company_product')->insert([


                'company_id' => $company->id,
                'product_id'  => $products,
                'created_at'  => $date,
                'updated_at'  => $date


            ]);


        }


    }


} 