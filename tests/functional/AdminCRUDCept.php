<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Create, edit and destroy Admin');

//Index to login
$I->amOnPage('/');
$I->click('Ingresa');

//Login into page
UserActionPage::of($I)->login('cabrerabywaters@gmail.com', '123');

//See if am logged like an admin
AdminActionPage::of($I)->imAdmin();

$I->dontSee('test');
$I->click('Crear admin','a');
$I->seeCurrentUrlEquals('/admins/create');
$I->fillField('email', 'test@test.test');        
$I->fillField('name', 'test');
$I->fillField('lastname', 'test');
$I->fillField('password', '123');
$I->fillField('password_confirmation', '123');
$I->click('Crear una cuenta','input[type="submit"]');
$I->seeCurrentUrlEquals('/admins');
$id = $I->grabFromDatabase('users','id', array('name' => 'Ignacio'));
$I->seeInDatabase('users', array('name' => 'test'));
$I->see('test');
$I->click('#'.$id,'a');
$I->seeCurrentUrlEquals('/admins/'.$id.'/edit');
$I->see('Ignacio');
$I->fillField('name', 'Edgardo');
$I->fillField('lastname', 'Edgardo');
$I->fillField('password', '123');
$I->fillField('password_confirmation', '123');
$I->click('input[type="submit"]');
$I->seeCurrentUrlEquals('/admins');
$I->dontSee('Ignacio');
$I->see('Edgardo');
$I->click('#'.$id,'button');
$I->seeCurrentUrlEquals('/admins');
$I->dontSee('Edgardo');
$I->see('test');

//Logout
UserActionPage::of($I)->logout();




