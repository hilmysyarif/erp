<?php

/*
|--------------------------------------------------------------------------
| Defines the error message span
|--------------------------------------------------------------------------
|
*/
function errors_for($attribute, $errors)
{


    return $errors->first($attribute, '<span class="label label-danger">:message</span>');
}

/*
|--------------------------------------------------------------------------
| Defines product photo path
|--------------------------------------------------------------------------
|
*/
function products_photo_path()
{
    return public_path() . '/images/products/';

}

/*
|--------------------------------------------------------------------------
| Checks if the admin is authenticated
|--------------------------------------------------------------------------
|
*/

function check_admin_auth()
{


    if (! Auth::check() or Auth::user()->role_id != 1) return false;

    return Auth::user()->role_id;

}


/*
|--------------------------------------------------------------------------
| Calculates time interval between two dates
|--------------------------------------------------------------------------
|
*/

function calculate_time_interval($start_date, $end_date)
{
    $start_date = date_create(date("Y-m-d", strtotime(str_replace('/', '-', $start_date))));
    $end_date   = date_create(date("Y-m-d", strtotime(str_replace('/', '-', $end_date))));


    $interval = date_diff($start_date, $end_date);
    $interval = $interval->format('%a');

    return $interval;

}

/*
|--------------------------------------------------------------------------
|Extracts days, months and week from a starting date and interval
|--------------------------------------------------------------------------
|
*/
function extract_dates($start_date, $interval)
{


    $start_date = explode('-', $start_date);
    $start_date = $start_date[2] . '-' . $start_date[1] . '-' . $start_date[0];


    $start_date = strtotime($start_date);
    $start_date = strtotime('1 day', $start_date);
    $dias       = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses      = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");


    $dates = [];


    for ($i = 0; $i <= $interval; $i ++)
    {

        $date = new DateTime(date("Y-m-d", $start_date));

        $week = $date->format("W");

        $next_day = strtotime('+1 day', $start_date);


        $start_date = $next_day;
        $year       = date('Y', $next_day);
        $month      = date('m', $next_day);
        $next_day   = date('d', $next_day);


        if (! isset($dates[$meses[$month - 1]]))
        {
            $dates[$meses[$month - 1]] = [];

        }

        if (! isset($dates[$meses[$month - 1]][$week]))
        {
            $dates[$meses[$month - 1]][$week] = [];

        }

        array_push($dates[$meses[$month - 1]][$week], ['complete' => $year . '-' . $month . '-' . $next_day, 'year' => $year, 'month' => $month, 'week' => $week, 'day' => $next_day]);


    }

    return json_decode(json_encode($dates), false);


}

/*
|--------------------------------------------------------------------------
|Gets the week day from a given date
|--------------------------------------------------------------------------
|
*/
function get_week_from_date($date)
{
    $date = strtotime(str_replace('/', '-', $date));

    $date = new DateTime(date("Y-m-d", $date));
    $week = $date->format("W");

    return $week;

}

/*
|--------------------------------------------------------------------------
|Formats de Information from the Orders and express them Grouped by Products
|--------------------------------------------------------------------------
|
*/
function group_by_product($orders)
{
    $gruped_orders   = [];
    $producto_actual = "";
    $count           = 0;
    $offer_count     = 0;

    //foreach weekly summary (groupped by week and product)
    foreach ($orders as $products)
    {
                //if the product has already being created
        if ($producto_actual == $products->product)
        {
            //Sum up all the offers and orders for every product for every week
            $count       = $count + $products->count;
            $offer_count = $offer_count + $products->offer_count;

            $gruped_orders[$producto_actual][0]['count'] = $count;
            $gruped_orders[$producto_actual][0]['offer_count'] = $offer_count;
            array_push($gruped_orders [$producto_actual][0],
                ['orders_amount' => $products->sum, 'week' => $products->week,
                 'offer_amount'=> $products->offer_sum, 'amount_left'=>$products->amount_left]

            );
        } else  //if the product has not been created
        {
            //create the product as a new array
            $producto_actual                  = $products->product;
            $gruped_orders [$producto_actual] = [];

            //insert the count of offers and orders for the first time
            $count       = $products->count;
            $offer_count = $products->offer_count;

            //Add other necessary components for displaying the product
            $gruped_orders[$producto_actual] = [
                ['name' => $products->product, 'img' => $products->img, 'count' => $count, 'offer_count' => $offer_count,
                    ['orders_amount' => $products->sum, 'week' => $products->week,
                     'offer_amount'=> $products->offer_sum,'amount_left'=>$products->amount_left]]
            ];
        }


    }

    return $gruped_orders;

}
