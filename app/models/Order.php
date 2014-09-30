<?php

class Order extends Eloquent {

    protected $guarded = ['id'];


    public function company()
    {


        return $this->belongsTo('Company');

    }

    public function product()
    {


        return $this->belongsTo('Product');

    }
		public function offers()
    {


        return $this->hasMany('Offer');

    }

}