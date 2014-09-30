<?php
// This is global bootstrap for autoloading
$dbh = new PDO('mysql:host=fundacion.c38gtktuy1vw.us-east-1.rds.amazonaws.com;dbname=chileagro_test;charset=utf8', 'fundacion', 'gestion123');
\Codeception\Module\Dbh::$dbh = $dbh;
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');

