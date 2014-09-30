<?php

$I = new FunctionalTester($scenario);
$I->am('a company user');
$I->wantTo('sign in to a Company account');

//Index to login
$I->amOnPage('/');
$I->click('Ingresa');

UserActionPage::of($I)->login('admin@company.com', '123');

//Logout
$I->seeCurrentUrlEquals('/companies/1/dashboard');
$I->see('Seguimiento de Órdenes');

UserActionPage::of($I)->logout();
