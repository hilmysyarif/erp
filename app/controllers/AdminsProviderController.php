<?php
use copol\Forms\ProviderRegistrationForm;
use copol\Repositories\DbProviderRepository;

class AdminsProviderController extends \BaseController {


//Call constructor for Registration form
    private $providerRegistrationForm;

    function __construct(ProviderRegistrationForm $providerRegistrationForm)
    {

        $this->providerRegistrationForm = $providerRegistrationForm;
    }

    /**
     * Display a listing of the resource.
     * GET /adminsprovider
     *
     * @return Response
     */
    public function index()
    {
        $role      = check_admin_auth();
        $providers = Provider::get(['id', 'fancy_name', 'rut']);

        return View::make('providers.index', compact('role', 'providers'));

    }

    /**
     * Show the form for creating a new resource.
     * GET /adminsprovider/create
     *
     * @return Response
     */
    public function create()
    {

        
        $role      = check_admin_auth();
        $products = Product::all();

        return View::make('providers.create', compact('role', 'products'));

    }

    /**
     * Store a newly created resource in storage.
     * POST /adminsprovider
     *
     * @return Response
     */
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

        return Redirect::action('AdminsProviderController@index');
    }

    /**
     * Display the specified resource.
     * GET /adminsprovider/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * GET /adminsprovider/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);
        $role      = check_admin_auth();

        return View::make('providers.edit', compact('role', 'provider'));


    }

    /**
     * Update the specified resource in storage.
     * PUT /adminsprovider/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $provider = Provider::find($id);

        $input = Input::all();

        $provider->update($input);
        $provider->save();

        return Redirect::to('admins/providers');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /adminsprovider/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}