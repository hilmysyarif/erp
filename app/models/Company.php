<?php


class Company extends Eloquent {

    protected $fillable = [

        'rut',
        'fancy_name',
        'description',
        'adress',
        'city',
        'location',
        'phone_number'


    ];

    public function products()
    {


        return $this->belongsToMany('Product');

    }

    public function users()
    {


        return $this->hasMany('User');

    }
    public function orders()
    {


        return $this->hasMany('Order');

    }

    public function offers()
    {
        return $this->hasManyThrough('Offer', 'Order');
    }


    public function banks()
    {


        return $this->hasMany('Bank');

    }


}