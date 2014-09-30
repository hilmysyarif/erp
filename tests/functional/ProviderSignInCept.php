<?php
$I = new FunctionalTester($scenario);
$I->am('a provider user');
$I->wantTo('sign in to a Provider account');

//Index to login
$I->amOnPage('/');
$I->click('Ingresa');
UserActionPage::of($I)->login('admin@provider.com', '123');

$I->seeCurrentUrlEquals('/providers/1/dashboard');
$I->see('Seguimiento de Órdenes');
UserActionPage::of($I)->logout();

