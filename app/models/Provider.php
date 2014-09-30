<?php



class Provider extends Eloquent{


    protected $fillable = [

        'rut',
        'fancy_name',
        'description',
        'adress',
        'city' ,
        'location',
        'phone_number',
        'cellphone_number'

    ];

    public function users(){


        return $this-> hasMany('User');

    }
    
    public function products(){


        return $this-> belongsToMany('Product');

    }






}