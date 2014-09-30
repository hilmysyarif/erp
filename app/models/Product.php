<?php


class Product extends Eloquent {


    protected $guarded = [
        'id'
    ];



    public function company()
    {


        return $this->belongsToMany('Company');

    }

    public function providers()
    {


        return $this->belongsToMany('Provider');

    }

    public function categories()
    {


        return $this->belongsToMany('Category');

    }

    public function orders()
    {


        return $this->hasMany('Order');

    }
}