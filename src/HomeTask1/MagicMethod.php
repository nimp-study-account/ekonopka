<?php
namespace Ekonopka\Exercise\HomeTask1;

use Ekonopka\Exercise\HomeTask1\models\ClCall;
use Ekonopka\Exercise\HomeTask1\models\ClUnset;
use Ekonopka\Exercise\HomeTask1\models\ClToString;


class MagicMethod{

    public function run()
    {
        self::getMethodName('__call');
        $callExample = new ClCall();
        $callExample->unknownMethod("Magic" , "Method");

        self::getMethodName('__toString');
        $toStringExample = new ClToString();
        echo $toStringExample;

        self::getMethodName('__unset');
        $unsetExample = new ClUnset();
        $prop = 'closeProp';
        echo $unsetExample->getCloseProp();
        unset($unsetExample->$prop);
        echo $unsetExample->getCloseProp();
    }

    /**
     * @param string $name
     */
    protected static function getMethodName($name)
    {
        echo 'Робота методу ' . $name . PHP_EOL;
    }
}

