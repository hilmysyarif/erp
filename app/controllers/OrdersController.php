<?php

use copol\Forms\OrderCreation;

class OrdersController extends \BaseController {


    //Call constructor for order validation


    private $orderCreation;

    function __construct(OrderCreation $orderCreation)
    {

        $this->orderCreation = $orderCreation;
    }

    /**
     * Display a listing of the resource.
     * GET /orders
     *
     * @return Response
     */

    public function index($companies)
    {
        $company = Company::find($companies);

        $product = Input::get('product');

        $orders = $company->orders->load('product');

        return View::make('orders.index', compact('orders', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /orders/create
     *
     * @return Response
     */
    public function create()
    {

        if (! Auth::check()) return Redirect::action('SessionsController@create');

        $company = Company::find(Auth::user()->company_id);

        if ($company->id != Auth::user()->company_id) return Redirect::home();
        $products = $company->products;

        return View::make('orders.create', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     * POST /orders
     *
     * @return Response
     */
    public function store()
    {


        $input = Input::only('product_id', 'start_date', 'end_date', 'amount', 'max_amount', 'max_amount_daily', 'min_amount', 'price', 'period');

        $this->orderCreation->validate($input);

        $order = Order::create($input);

        $order->company_id = Auth::user()->company_id;

        $start_date         = Input::only('start_date')['start_date'];
        $order->week_number = get_week_from_date($start_date);

        $order->save();


        return Redirect::action('UsersController@index');

    }

    /**
     * Display the specified resource.
     * GET /orders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($company, $order)
    {
        if (is_numeric($order))
        {
            $orders = Company::findOrFail($company)->orders->find($order);

            $offers = Offer::where('order_id', '=', $order)
                ->where('provider_id', '=', Auth::user()->provider_id)
                ->get();

            $company = Company::find($company);

            $interval = calculate_time_interval($orders->start_date, $orders->end_date);

            $dates = extract_dates($orders->start_date, $interval);

            $offer_dates = array_pluck($offers, 'date');


        }


        return View::make('orders.show', compact('offer_dates', 'offers', 'orders', 'company', 'interval', 'dates', 'start_at'));


    }

    /**
     * Show the form for editing the specified resource.
     * GET /orders/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /orders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /orders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display the specified resource.
     * GET /orders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function showOrdersProduct($product)
    {


        if (is_numeric($product))
        {
            $orders  = Order::where('product_id', '=', $product)->get();
            $product = Product::find($product);
            $orders->load('company');

            return View::make('orders.showOrdersProduct', compact('orders', 'product', 'offers'));
        }


    }

    /**
     * Display the specified resource.
     * GET /orders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function summary($company, $start_date, $end_date)
    {


        $orders = Company::join('orders', 'companies.id', '=', 'orders.company_id')
            ->join('products', 'products.id', '=', 'orders.product_id')

            ->leftJoin('offers', function ($join)
            {
                $join->on('orders.id', '=', 'offers.order_id')
                    ->where('offers.state', '=', 'pending');
            })
            ->where('companies.id', '=', $company)
            ->where('orders.start_date', '>=', $start_date)
            ->where('orders.end_date', '<=', $end_date)

            ->select('products.name as product',
                'products.rzTn_img_url as img',
                DB::raw('sum(orders.amount) as sum'),
                DB::raw('count(orders.amount) as count'),
                'orders.week_number as week',
                DB::raw('count(offers.id) as offer_count'),
                DB::raw('ifNull(sum(offers.amount),0) as offer_sum'),
                DB::raw('(sum(orders.amount)-ifNull(sum(offers.amount),0)) as  amount_left')

            )
            ->orderBy('products.name')
            ->orderBy('orders.week_number')
            ->groupBy('products.name')
            ->groupBy('orders.week_number')
            ->get();


        $orders = group_by_product($orders);

        return $orders;


    }


}