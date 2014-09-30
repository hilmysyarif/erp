<?php



namespace copol\Forms;

use Laracasts\Validation\FormValidator;

class OrderCreation extends FormValidator {

    protected $rules = [

        'product_id' => 'required|not_in:0',
        'start_date' => 'required',
        'end_date'   => 'required',
        'min_amount' => 'required|integer',
        'amount'     => 'required|integer',
        'max_amount' => 'required|integer',
        'max_amount_daily' => 'required|integer',
        'price'      => 'required',
        'period'     => 'required|not_in:0'

    ];
} 