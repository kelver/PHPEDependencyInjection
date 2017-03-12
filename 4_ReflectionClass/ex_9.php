<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 11/03/17
 * Time: 21:11
 */

namespace MyNamespace{
    class Dependency
    {
        public function showMe()
        {
            return "Class Dependency has ben used.";
        }
    }

    $class =new \ReflectionClass('MyNamespace\Dependency');
//    $object = $class->newInstance();
//    var_dump($object->showMe());
    var_dump($class->getMethods());
}