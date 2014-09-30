<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Create, edit and destroy Company');

//Index to login
$I->amOnPage('/');
$I->click('Ingresa');

//Login into page
UserActionPage::of($I)->login('cabrerabywaters@gmail.com', '123');

//See if am logged like an admin
AdminActionPage::of($I)->imAdmin();

$I->click('Agregar Empresa','a');
$I->seeCurrentUrlEquals('/admins/companies/create');
$I->fillField('rut','111111111');
$I->fillField('fancy_name','test');
$I->fillField('description','test');
$I->fillField('adress','test');
$I->fillField('city','test');
$I->fillField('location','test');
$I->fillField('phone_number','123456789');
$I->click('Añadir Producto', 'button');
$I->click('.btn-primary');
$I->amOnPage('/admins/companies');
$I->see('Jumbo');
$I->see('test');
$I->see('111111111');

$I->click('Ver Productos', 'a');
$I->seeCurrentUrlEquals('/admins/companies/1/products');
$I->see('Productos de Jumbo');
$I->click('.glyphicon-trash');
$I->seeCurrentUrlEquals('/admins/companies/1/products');
$I->dontSee('Limón Granel');
$I->click('Agregar Producto');
$I->amOnPage('/admins/companies/1/products/create');


//Logout
UserActionPage::of($I)->logout();




