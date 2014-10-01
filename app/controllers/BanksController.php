<?php

class BanksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /banks
	 *
	 * @return Response
	 */


    public function index($companies)
    {
        $company = Company::find($companies);

        $banks = $company->banks;


        return View::make('banks.index', compact('banks'));
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /banks/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /banks
	 *
	 * @return Response
	 */
	public function store($companies)
	{

        $name   = Input::get('name');
        $bank              = New Bank;
        $bank->name =   $name;
        $bank->company_id    = $companies;

        $bank->save();

        return $bank;
	}

	/**
	 * Display the specified resource.
	 * GET /banks/{id}
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
	 * GET /banks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /banks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($companies, $id)
	{


        $bank = Bank::find($id);
        $bank->name = Input::get('name');
        $bank->save();
        return $bank;

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /banks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($companies, $id)
	{
        $bank = Bank::find($id);
        $bank->delete();
	}

    public function getall($companies)
    {

      $company = Company::find($companies);

        $banks = $company->banks;
        return $banks;


    }

}