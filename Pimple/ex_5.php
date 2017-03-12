<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 11/03/17
 * Time: 03:13
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Pimple\Container;

$ioc = new Container();

$ioc['multiplicador'] = 10;

$ioc['soma'] = $ioc->protect(function ($a, $b){
    return $a+$b;
});

$sum = $ioc['soma'];
echo $sum(1,2)*$ioc['multiplicador'];