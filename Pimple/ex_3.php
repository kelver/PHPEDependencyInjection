<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 11/03/17
 * Time: 03:13
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Pimple\Container;

class TestAdapter
{
    public function __construct()
    {
        var_dump(TestAdapter::class.'::__construct()');
    }

    public function RunTest($message)
    {
        var_dump($message);
    }
}

class Tester
{
    public function __construct(TestAdapter $adapter)
    {
        $adapter->RunTest('Rodou um teste.');
    }
}

$ioc = new Container();

//TestAdapter
$ioc['ta'] = function($c){
    return new TestAdapter;
};

//Tester
$ioc['tester'] = function($c){
    return new Tester($c['ta']);
};

$tester = $ioc['tester'];