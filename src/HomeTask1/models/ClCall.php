<?php
namespace Ekonopka\Exercise\HomeTask1\models;

/**
 * Class ClCall
 * @package Ekonopka\Exercise\HomeTask1
 * Цей клас реалізує магічний метод __call,
 * запускається під час виклику недоступних методів в об'єкті. Тобто. якщо ви звертаєтеся до методу об'єкта,
 * якого немає, то запускається метод __call()
 */
class ClCall
{
    function __call($name , $parameters){
        echo "Name of method => " . $name."\n";
        echo "Parameters provided: \n";
        print_r($parameters);
        echo PHP_EOL;
    }
}