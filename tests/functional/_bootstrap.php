<?php
// Here you can initialize variables that will be available to your tests

$datetime = new DateTime('tomorrow');
define('NOW', date("Y-m-d"));
define('TOMORROW', $datetime->format('Y-m-d'));
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');

