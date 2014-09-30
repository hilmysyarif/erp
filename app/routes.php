<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|	
| Las rutas están separadas en grupos de autenticación.
|	Si se desea agregar un grupo o modificar alguno basta con ir a app/filters.php
|	
|	
|
*/

//ver queries
/*
Event::listen('illuminate.query', function($sql){

    var_dump($sql);
});
*/


/*
|--------------------------------------------------------------------------
| Routes for Home
|--------------------------------------------------------------------------
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('/index', ['as' => 'homeUser', 'uses' => 'UsersController@index']);


/*
|--------------------------------------------------------------------------
| Routes for Companies
|--------------------------------------------------------------------------
|
*/

Route::group(['before' => 'auth|!company'], function()

{
    Route::resource('companies', 'CompaniesController');
    Route::resource('companies.orders', 'OrdersController');

    Route::get('companies/{companies}/dashboard',
        [  'as'=>'companies.dashboard', 'uses' => 'CompaniesController@dashboard']);

    Route::get('companies/{companies}/profile', 'CompaniesController@profile');
   
    Route::get('companies/{companies}/offers/{order}/status/{date}',
        [  'as'=>'companies.offer.status', 'uses' => 'OffersController@status']);
   
    Route::post('companies/{companies}/offers/{order}/take',
        [  'as'=>'companies.offer.take', 'uses' => 'OffersController@take']);

    Route::get('companies/{companies}/offers/{order}',
        [  'as'=>'companies.offer.show', 'uses' => 'OffersController@company']);

    Route::get('companies/{companies}/start/{start_date}/end/{end_date}',
        [  'as'=>'companies.orders.summary', 'uses' => 'OrdersController@summary']);
 

});

/*
|--------------------------------------------------------------------------
| Routes for Providers
|--------------------------------------------------------------------------
|
*/

Route::group(['before' => 'auth|!provider'], function ()
{
    Route::resource('providers', 'ProvidersController');
    Route::resource('offers','OffersController');
    Route::get('providers/{providers}/dashboard',
        [  'as'=>'providers.dashboard', 'uses' => 'ProvidersController@dashboard']);

    Route::get('providers/{providers}/profile', 'ProvidersController@profile');

    Route::get('providers/companies/{companies}/orders/{orders}',
        [  'as'=>'providers.orders.show', 'uses' => 'OrdersController@show']);

		
		Route::get('providers/companies/{companies}/offer/{orders}',
        [  'as'=>'providers.offers.show', 'uses' => 'OffersController@show']);

    Route::get('providers/orders_for/{product}',
        [ 'as'=>'orders_for.product', 'uses' => 'OrdersController@showOrdersProduct']);
});

/*
|--------------------------------------------------------------------------
| Routes For Admins
|--------------------------------------------------------------------------
|
*/
Route::group(['before' => 'auth|admin'], function ()
{

	
	//Companies products
	Route::get('admins/companies/{company_id}/products/create', 'AdminsCompanyProductController@create');
	Route::get('admins/companies/{company_id}/products/store', 'AdminsCompanyProductController@store');
	Route::get('admins/companies/{company_id}/products/{product_id}', 'AdminsCompanyProductController@destroy');
	Route::get('admins/companies/{company_id}/products', 'AdminsCompanyProductController@index');
	//Providers products
	Route::get('admins/providers/{provider_id}/products/create', 'AdminsProviderProductController@create');
	Route::get('admins/providers/{provider_id}/products/store', 'AdminsProviderProductController@store');
	Route::get('admins/providers/{provider_id}/products/{product_id}', 'AdminsProviderProductController@destroy');
	Route::get('admins/providers/{provider_id}/products', 'AdminsProviderProductController@index');
	//admin perfil
    Route::get('admin/{admin}/perfil', 'ProvidersController@perfil');

	Route::resource('admins/providers', 'AdminsProviderController');
	Route::resource('admins/companies', 'AdminsCompanyController');
	Route::resource('admins/products', 'AdminsProductController');
	Route::resource('admins/users', 'AdminsUserController');
	Route::resource('admins', 'AdminsController');
});	
	

/*
|--------------------------------------------------------------------------
| User Routes for Registration
|--------------------------------------------------------------------------
|
*/

Route::get('/register', 'RegistrationController@create');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);


/*
|--------------------------------------------------------------------------
| Sessions and Authentication
|--------------------------------------------------------------------------
|
*/
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
