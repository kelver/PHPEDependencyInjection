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
use \Zend\ServiceManager\Factory\FactoryInterface;

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

class TesterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Tester($container->get('ta'));
    }
}

$serviceManager = new ServiceManager([
    'factories' => [
        'ta' => function(ContainerInterface $c){
            return new TestAdapter;
        },
        'tester' => TesterFactory::class
    ]
]);

$ta = $serviceManager->get('ta');
$tester = $serviceManager->build('tester');
$tester = $serviceManager->build('tester');

var_dump($ta, $tester);