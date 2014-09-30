<?php

class UsersController extends BaseController {

    public function index()
    {

        //comprobamos que el usuario esté registrado
        if (! Auth::check()) return Redirect::home();


        //comprobamos si el usuario es admin
        if ( Auth::user()->provider_id == 0 and  Auth::user()->company_id == 0)
        {
            //si es admin redireccionamos a AdminController
           if( Auth::user()->role_id == 1)
            {
                return Redirect::action('AdminsController@index');
            }
            //Si no es admin ni provider ni company (caso raro) redireccionamos a Registro
                return Redirect::action('RegistrationController@create');
        }
        //Si es provider
        elseif ( Auth::user()->provider_id != 0)
        {   //Redireccionamos a Provider
           return Redirect::action('ProvidersController@dashboard',['provider' =>  Auth::user()->provider_id ]);
        }
        //Si es Company
        elseif ( Auth::user()->company_id != 0)
        {
            //Redireccionamos a company.
            return Redirect::action('CompaniesController@dashboard',['company' =>  Auth::user()->company_id]);
        }

    }





}