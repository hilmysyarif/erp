<?php 
use \Codeception\Util\Locator;
$I = new FunctionalTester($scenario);
$I->wantTo('Create a new offer');
//Index to login
$I->amOnPage('/');
$I->click('Ingresa');
UserActionPage::of($I)->login('admin@company.com', '123');
$I->seeCurrentUrlEquals('/companies/1/dashboard');
$I->click('Agregar Nueva Orden');
$I->seeCurrentUrlEquals('/companies/1/orders/create');
$I->selectOption('product_id','Limón Granel');
$I->selectOption('period','Todos los días (Lunes-Viernes) en un Periodo');
$I->fillField('start_date', NOW);
$I->fillField('end_date', TOMORROW);
$I->fillField('amount', 100);
$I->fillField('min_amount', 90);
$I->fillField('max_amount', 100);
$I->fillField('max_amount_daily', 10);
$I->fillField('price', 100);
$I->click('Crear Orden');
$I->seeCurrentUrlEquals('/companies/1/dashboard');
$I->click('Ver Ordenes');
$I->see(NOW);
$I->seeInDatabase('orders', array('start_date' => NOW));
$id = $I->grabFromDatabase('orders','id', array('start_date' => NOW));
$I->see($id);
$I->see('Ver Ofertas', Locator::href('http://localhost/companies/1/offers/'.$id));
$I->see('Editar', Locator::href('http://localhost/companies/1/orders/'.$id.'/edit'));



UserActionPage::of($I)->logout();

