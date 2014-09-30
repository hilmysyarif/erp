<?php



namespace copol\Forms;

use Laracasts\Validation\FormValidator;

class AdminRegistrationForm extends FormValidator {

    protected $rules = [

				'email'    => 'required|email|unique:users',
				'name'     =>'required',
				'lastname' =>'required',
				'password' => 'required|confirmed'
    ];
} 