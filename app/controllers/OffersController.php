<?php

class OffersController extends \BaseController {

    /**
     * Display a listing of offers
     *
     * @return Response
     */
    public function index($order)
    {
        $order  = Order::find($order);
        $offers = $order->offers()->get();

        return View::make('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new offer
     *
     * @return Response
     */
    public function create()
    {

        return View::make('offers.create');
    }

    /**
     * Store a newly created offer in storage.
     *
     * @return Response
     */
    public function store()
    {
        $order   = Input::get('order');
        $company = Input::get('company');    
        $amounts = Input::get('amount');
        $prices  = Input::get('price');
        $dates   = Input::get('date');

        foreach ($dates as $number => $date)
        {
            if (! empty($amounts[$number]) && ! empty($prices[$number]))
            {

                $offer              = New Offer;
                $offer->provider_id = Auth::user()->provider_id;
                $offer->order_id    = $order;
                $offer->date        = $date;
                $offer->amount      = $amounts[$number];
                $offer->price       = $prices[$number];
                $offer->state       = "pending";
                $offer->save();
            }
        }

        return Redirect::route('orders_for.product',[$company,$order]);
    }

    /**
     * Display the specified offer.
     *
     * @param  int $id
     * @return Response
     */
    public function show($companies, $orders)
    {


        $offers  = Offer::where('order_id', '=', $orders)
            ->where('provider_id', '=', Auth::user()->provider_id)
            ->get();
        $company = Company::find($companies);

        return View::make('offers.show', compact('offers', 'company'));
    }

    /**
     * Show the form for editing the specified offer.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);

        return View::make('offers.edit', compact('offer'));
    }

    /**
     * Update the specified offer in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $offer = Offer::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Offer::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $offer->update($data);

        return Redirect::route('offers.index');
    }

    /**
     * Remove the specified offer from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Offer::destroy($id);

        return Redirect::route('offers.index');
    }

    public function company($companies, $order)
    {
        $offers = Order::find($order)->offers()->groupBy('date')->get();

        return View::make('offers.index', compact('offers', 'order', 'companies'));
    }

    public function status($companies, $order, $date)
    {
        $order_status = Order::find($order);
        $offers       = Order::find($order)->offers()->where('date', '=', $date)->get();

        return View::make('offers.show_company', compact('companies', 'order_status', 'offers', 'order', 'date'));
    }

    public function take($companies, $order)
    {

        $offers = Order::find($order)->offers()->groupBy('date')->get();

        return View::make('offers.index', compact('offers', 'order', 'companies'));


    }
}
