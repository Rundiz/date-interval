<?php


require __DIR__.'/Autoload.php';

$Autoload = new \Rundiz\DateInterval\Tests\Autoload();
$Autoload->addNamespace('Rundiz\\DateInterval\\Tests', __DIR__);
$Autoload->addNamespace('Rundiz\\DateInterval', dirname(dirname(__DIR__)).'/Rundiz/DateInterval');
$Autoload->register();
