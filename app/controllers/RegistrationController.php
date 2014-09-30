<?php


use copol\Forms\RegistrationForm;


class RegistrationController extends BaseController {



    private $registrationForm;
    function __construct(RegistrationForm $registrationForm)
    {

        $this->registrationForm = $registrationForm;
    }

    public function index()
    {


        return View::make('registrations.index');

    }

    public function create()
    {

           if(Auth::check()) return Redirect::back();
        return View::make('registrations.create');

    }


    public function store()
    {

        $input = Input::only('email', 'password','password_confirmation');


        $this->registrationForm->validate($input);

        $user = User::create($input);

        Auth::login($user);

        return Redirect::to('index');

    }


}