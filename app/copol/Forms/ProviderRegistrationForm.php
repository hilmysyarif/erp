<?php



namespace copol\Forms;

use Laracasts\Validation\FormValidator;

class ProviderRegistrationForm extends FormValidator {

    protected $rules = [

        'rut'    => 'required|unique:providers',
        'fancy_name' => 'required',
        'description' => 'required',
        'adress' => 'required',
        'city' => 'required',
        'location' => 'required',
        'phone_number' => 'required',

    ];
} 