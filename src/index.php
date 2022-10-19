<?php
namespace Ekonopka\Exercise;
require_once __DIR__.'/../vendor/autoload.php';

use Ekonopka\Exercise\HomeTask1\MagicMethod;
use Ekonopka\Exercise\HomeTask2\Router;

$inputData = readline('Введіть номер завдання: 1 - магічні методы, 2 - короткі посилланя'.PHP_EOL);

switch ($inputData){
    case 1 :
        //Перше завдання
        $obj = new MagicMethod();
        $obj->run();
        break;
    case 2 :
        //Друге завдання
        //echo "в розробці";
        $obj = new Router();
        $obj->run();
        break;
    default:
        throw new \Exception("Invalid argument supplied");
}




echo PHP_EOL;