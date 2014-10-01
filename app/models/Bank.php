<?php
class Bank extends Eloquent {
    protected $fillable = [];


    public function company()
    {


        return $this->belongsTo('Company');

    }


}
