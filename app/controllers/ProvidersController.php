<?php
use copol\Forms\ProviderRegistrationForm;
use copol\Repositories\DbProviderRepository;

class ProvidersController extends BaseController {

//Call constructor for Registration form
    private $providerRegistrationForm;

    function __construct(ProviderRegistrationForm $providerRegistrationForm)
    {

        $this->providerRegistrationForm = $providerRegistrationForm;
    }


    public function index()
    {
      return View::make('providers.index');
    }


    public function show($provider)
    {
        $provider = Provider::find($provider);
        $products = $provider->products;

        return View::make('providers.show', compact('products'));

    }

    public function create()
    {
        $provider = 0;
        $products = Product::all();

        return View::make('providers.create', compact('provider', 'products'));

    }

    public function store()
    {

        $input = Input::only('rut', 'fancy_name', 'description', 'adress', 'city', 'location', 'phone_number');
        $this->providerRegistrationForm->validate($input);
        
        $provider = Provider::create($input);
        $authUser = Auth::user()->id;
        Event::fire('provider.created', [$provider, $authUser]);


        $amount   = Input::only("amount");
        $products = Input::only("productos");

        //Insert products in pivot table product_provider
        Event::fire('provider.associeted', [$products, $provider, $amount]);

        return Redirect::action('UsersController@index');

    }

    public function edit($id)
    {
        if ($id == Auth::user()->provider_id)
        {
            $provider = Provider::find($id);

            return View::make('providers.edit', compact('provider'));
        } else
        {

            return Redirect::action('UsersController@index');

        }

    }
    public function profile($id)
    {
        if ($id == Auth::user()->provider_id)
        {
            $user = User::find($id);

            return View::make('layouts.profile',['user' => $user]);
        } else
        {

            return Redirect::action('UsersController@index');

        }

    }

    public function update($id)
    {

        $provider = Provider::find($id);

        $input = Input::all();
        $provider->update($input);
        $provider->save();


        return Redirect::action('ProvidersController@edit', ['provider' => $id]);


    }

    public function dashboard($providers)
    {

        $provider = Provider::find($providers);
        $products = $provider->products;

        return View::make('providers.dashboard', compact('products'));


    }

}



