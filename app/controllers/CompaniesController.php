<?php
use copol\Forms\ProviderRegistrationForm;
use copol\Repositories\DbProviderRepository;

class CompaniesController extends BaseController {

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


    public function show($company)
    {


        //this controller modifies company profile
        if (! Auth::check() or ($company != Auth::user()->company_id)) return Redirect::home();


        $company = Company::find($company);
        $products = $company->products;
        $products->load('orders');


        return View::make('companies.show', compact('products'));


    }


    public function edit($id)
    {
        if ($id == Auth::user()->company_id)
        {
            $company = Company::find($id);

            return View::make('companies.edit', compact('company'));

        } else
        {

            return Redirect::home();

        }

    }
    public function profile($id)
    {
        if ($id == Auth::user()->company_id)
        {
            $user= User::find($id);

            return View::make('layouts.profile',['user' => $user]);

        } else
        {

            return Redirect::home();

        }

    }
    public function update($id)
    {


        $company = Company::find($id);

        $input = Input::all();
        $company->update($input);
        $company->save();


        return Redirect::action('companies@edit', ['company' => $id]);


    }


    public function dashboard($companies)
    {

        if (! Auth::check() or ($companies != Auth::user()->company_id)) return Redirect::home();


        $company = Company::find($companies);
        $products = $company->products;
        $products->load('orders');


        return View::make('companies.dashboard', compact('products'));


    }

    public function store()
    {

        return Company::create(Input::only('rut','fancy_name'));


    }



}



