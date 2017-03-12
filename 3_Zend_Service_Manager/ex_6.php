<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 11/03/17
 * Time: 20:03
 */

require_once __DIR__.'/../vendor/autoload.php';

use \Interop\Container\ContainerInterface;
use \Zend\ServiceManager\ServiceManager;
use \Zend\ServiceManager\Factory\InvokableFactory;

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

$serviceManager = new ServiceManager([
    'factories' => [
        'ta' => function(ContainerInterface $c){
            return new TestAdapter;
        },
        'tester' => function(ContainerInterface $c){
            return new Tester($c->get('ta'));
        }
    ]
]);

$ta = $serviceManager->get('ta');
$tester = $serviceManager->get('tester');

var_dump($ta, $tester);