<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('sign in to a Admin account');
//Index to login
$I->amOnPage('/');
$I->seeCurrentUrlEquals('/');
$I->click('Ingresa');

//Login into page
UserActionPage::of($I)->login('cabrerabywaters@gmail.com', '123');
AdminActionPage::of($I)->imAdmin();

//See if am logged like an admin

//$id = $I->grabFromDatabase('users','id', array('name' => 'Ignacio'));


//Logout
UserActionPage::of($I)->logout();



