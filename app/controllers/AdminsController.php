<?php

use copol\Forms\AdminRegistrationForm;
class AdminsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	private $AdminRegistrationForm;
   function __construct(AdminRegistrationForm $AdminRegistrationForm)
  	{

      $this->AdminRegistrationForm = $AdminRegistrationForm;
  	}

	public function index()
	{ 
	       
		$admins = User::admins();    
    return View::make('admins.index', compact('role','admins'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	 	
	 	$input    = Input::only('email', 'password','password_confirmation', 'name', 'lastname');
	 	$this->AdminRegistrationForm->validate($input);
	 	
	 	// Create users with role_id = 1 by default
	 	$user = new User($input);
    $user->role_id = 1;
    $user->save();

	 	return Redirect::to('/admins');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$admin = User::find($id);
		return View::make('admins.index', compact('role','admin'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$admin = User::find($id);
    return View::make('admins.edit', compact('admin'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$admin = User::find($id);

    $input = Input::all();
    $admin->update($input);
    $admin->save();

    return Redirect::route('admins.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
 		$user = User::find($id);
		$user->delete();
 
		return Redirect::route('admins.index');
	}

}