    <?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 11/03/17
 * Time: 21:11
 */
require_once __DIR__ . '/../vendor/autoload.php';

class TestAdapter
{
    public function __construct()
    {
        var_dump(TestAdapter::class.'::__construct()');
    }
    public function runTest($message)
    {
        var_dump($message);
    }
}

class Tester
{
    public function __construct(TestAdapter $adapter, string $message = 'Rodou um teste.')
    {
        $adapter->runTest($message);
    }
}

//$test_adapter = (new \KMV\DI\Resolver())
//    ->resolveClass('Tester', ['message' => 'Rodou outro teste.']);

$test_adapter = (new \KMV\DI\Resolver())
    ->resolveClass('Tester');