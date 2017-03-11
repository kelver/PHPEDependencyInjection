<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 11/03/17
 * Time: 03:13
 */

//Dependency inversion

class Database
{
    public function __construct(\PDO $pdo)
    {
        $this->driver = $pdo;
    }
}

$ioc = [];
$ioc['db'] = function(){
    $pdo = new \PDO('dsn=host;dbname','user','senha');
    return $pdo;
};
$ioc['db']();

$pdo = new Database();
$pdo = new \PDO('dsn=host;dbname','user','senha');