<?php

class PagesController extends BaseController {

    public function index()
    {

        if (Auth::check())
        {
            return Redirect::action('UsersController@index');
        }

        return View::make('pages.index');

    }


    public function register()
    {


        return View::make('pages.register');

    }


}