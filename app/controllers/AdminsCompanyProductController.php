<?php

class AdminsCompanyProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /adminscompanyproduct
	 *
	 * @return Response
	 */
	public function index($company_id)
	{

		$company  = Company::find($company_id);
		$products = Company::find($company_id)->products;
		return View::make('companies.products.index', compact('products','company','company_id'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminscompanyproduct/create
	 *
	 * @return Response
	 */
	public function create($company_id)
	{	
		$products = Product::all()->lists('name','id');
		return View::make('companies.products.create', compact('company_id','products'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminscompanyproduct
	 *
	 * @return Response
	 */
	public function store($company_id)
	{
		$input = Input::all();
		$company = Company::find($company_id);
		$company->products()->attach($input);
		return Redirect::to('admins/companies/'.$company_id.'/products/');

	}

	/**
	 * Display the specified resource.
	 * GET /adminscompanyproduct/{id}
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
	 * GET /adminscompanyproduct/{id}/edit
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
	 * PUT /adminscompanyproduct/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adminscompanyproduct/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($company_id,$product_id)
	{
		
		$company = Company::find($company_id);
		$company->products()->detach($product_id);
		return Redirect::to('admins/companies/'.$company_id.'/products/');
			
	}

}