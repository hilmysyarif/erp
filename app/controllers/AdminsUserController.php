<?php

use copol\Forms\RegistrationForm;

class AdminsUserController extends \BaseController {


    private $registrationForm;

    function __construct(RegistrationForm $registrationForm)
    {

        $this->registrationForm = $registrationForm;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //We have to change the All() method! All is not good!
        $users = User::with('company', 'provider')->get();


        if (! check_admin_auth()) return Redirect::action('SessionsController@create');
        $role = check_admin_auth();


        return View::make('users.index', compact('role', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! check_admin_auth()) return Redirect::action('SessionsController@create');
        $role      = check_admin_auth();
        $companies = Company::get(['id', 'fancy_name']);
        $providers = Provider::get(['id', 'fancy_name']);

        return View::make('registrations.create', compact('role', 'providers', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input     = Input::only('email', 'password', 'password_confirmation');
        $workInput = Input::only('workplace')['workplace'];
        $workplace = substr($workInput, 1, strlen($workInput) - 1);


        $this->registrationForm->validate($input);

        $user = User::create($input);

        if ($workInput{0} == 1)
        {
            $user->provider_id = $workplace;
            $user->save();

        } elseif ($workInput{0} == 2)
        {
            $user->company_id = $workplace;
            $user->save();
        }


        return Redirect::action('AdminsUserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
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
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}