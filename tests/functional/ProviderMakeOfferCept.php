<?php 
use \Codeception\Util\Locator;
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
UserActionPage::of($I)->login('admin@provider.com', '123');
$I->seeCurrentUrlEquals('/providers/1/dashboard');
$I->see('admin@provider.com');

$I->see('Seguimiento de Órdenes');
$I->click('Ordenes');
$I->seeCurrentUrlEquals('/providers/orders_for/1');
$I->see('Limón Granel');
$I->click('','a');
$I->seeCurrentUrlEquals('/providers/companies/1/orders/1');
$I->see('Jumbo');
$I->see('Aún no haz Ofertado. Qué esperas?');
$I->see('Cantidad a Entregar:');
$I->submitForm('#form', array(
     'amount[]' => '100',
     'price[]' => '100'
));
//$I->fillField('', '100');
UserActionPage::of($I)->logout();