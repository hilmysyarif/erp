<?php

class AdminsProviderProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /adminscompanyproduct
	 *
	 * @return Response
	 */
	public function index($provider_id)
	{

		$provider = Provider::find($provider_id);
		$products = Provider::find($provider_id)->products;
		return View::make('companies.products.index', compact('products','provider','provider_id'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminscompanyproduct/create
	 *
	 * @return Response
	 */
	public function create($provider_id)
	{	
		$products = Product::all()->lists('name','id');
		return View::make('provider.products.create', compact('provider_id','products'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminscompanyproduct
	 *
	 * @return Response
	 */
	public function store($provider_id)
	{
		$input = Input::all();
		$company = Provider::find($provider_id);
		$company->products()->attach($input);
		return Redirect::to('admins/providers/'.$provider_id.'/products/');

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
	public function destroy($provider_id,$product_id)
	{
		
		$provider = Provider::find($provider_id);
		$provider->products()->detach($product_id);
		return Redirect::to('admins/companies/'.$provider_id.'/products/');
			
	}

}