<?php

class Offer extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
	'provider_id',
	'order_id',
	'date',
	'amount',
	'price',
	'state'
	];
	
	public function order()
    {

        return $this->belongsTo('Order');

    }

	public function provider()
    {
        return $this->belongsTo('Provider');

    }
}