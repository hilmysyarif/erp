<?php

class AdminsCompanyController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //We have to change the All() method! All is not good!
        $companies = Company::get(['id','fancy_name','rut']);
        $role      = check_admin_auth();


        return View::make('companies.index', compact('role', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        $role      = check_admin_auth();
        $products = Product::all();

        return View::make('companies.create', compact('role','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('rut', 'fancy_name', 'description', 'adress', 'city', 'location', 'phone_number');
        $company = Company::create($input);
        $products = Input::only("productos");



        //Insert products in pivot table company_product
        Event::fire('company.created', [$products, $company]);


        return Redirect::action('AdminsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $role      = check_admin_auth();

        return View::make('companies.edit', compact('role', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $company = Company::find($id);

        $input = Input::all();

        $company->update($input);
        $company->save();

        return Redirect::to('admins/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}