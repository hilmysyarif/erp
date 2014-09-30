<?php


class OrdersTableSeeder extends Seeder {

    public function run()
    {
        Order::create([

            "company_id"       => 1,
            "product_id"       => 1,
            "start_date"       => "2014-06-02",
            "end_date"         => "2014-06-02",
            "amount"           => "10",
            "week_number"      => "39",
            "max_amount"       => "1000",
            "max_amount_daily" => "100",
            "min_amount"       => "900",
            "price"            => "30000",
            "period"           => 2,
            "confirmed"        => false


        ]);
        Order::create([

            "company_id"       => 1,
            "product_id"       => 1,
            "start_date"       => "2014-07-04",
            "end_date"         => "2014-07-04",
            "amount"           => "20",
            "week_number"      => "39",
            "max_amount"       => "1000",
            "max_amount_daily" => "100",
            "min_amount"       => "900",
            "price"            => "30000",
            "period"           => 2,
            "confirmed"        => false


        ]);

        Order::create([

            "company_id"       => 1,
            "product_id"       => 2,
            "start_date"       => "2014-09-04",
            "end_date"         => "2014-09-04",
            "amount"           => "70",
            "week_number"      => "42",
            "max_amount"       => "1000",
            "max_amount_daily" => "100",
            "min_amount"       => "900",
            "price"            => "30000",
            "period"           => 2,
            "confirmed"        => false


        ]);

        Order::create([

            "company_id"       => 1,
            "product_id"       => 2,
            "start_date"       => "2014-09-04",
            "end_date"         => "2014-09-04",
            "amount"           => "30",
            "week_number"      => "44",
            "max_amount"       => "1000",
            "max_amount_daily" => "100",
            "min_amount"       => "900",
            "price"            => "30000",
            "period"           => 2,
            "confirmed"        => false


        ]);

        Order::create([

            "company_id"       => 1,
            "product_id"       => 2,
            "start_date"       => "2014-09-04",
            "end_date"         => "2014-09-04",
            "amount"           => "9",
            "week_number"      => "43",
            "max_amount"       => "1000",
            "max_amount_daily" => "100",
            "min_amount"       => "900",
            "price"            => "30000",
            "period"           => 2,
            "confirmed"        => false


        ]);

        Order::create([

            "company_id"       => 1,
            "product_id"       => 1,
            "start_date"       => "2014-09-04",
            "end_date"         => "2014-09-04",
            "amount"           => "9",
            "week_number"      => "43",
            "max_amount"       => "1000",
            "max_amount_daily" => "100",
            "min_amount"       => "900",
            "price"            => "30000",
            "period"           => 2,
            "confirmed"        => false


        ]);
    }

}