<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 11/03/17
 * Time: 20:03
 */

require_once __DIR__.'/../vendor/autoload.php';

use \Zend\ServiceManager\ServiceManager;

$serviceManager = new ServiceManager([
    'services' => [],
    'factories' => [],
    'abstract_factories' => [],
    'delegators' => [],
    'shared' => [],
    'shared_by_default' => []
]);