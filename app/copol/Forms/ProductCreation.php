<?php



namespace copol\Forms;

use Laracasts\Validation\FormValidator;

class ProductCreation extends FormValidator {

    protected $rules = [

        'name'    => 'required|unique:products',
        'description' => 'required'


    ];
} 