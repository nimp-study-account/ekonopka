<?php
namespace Ekonopka\Exercise\HomeTask1\models;

/**
 * Class ClToString
 * @package Ekonopka\Exercise\HomeTask1\models
 * дозволяє визначити логіку роботи програми, при спробі привести об'єкт до типу рядка
 */
class ClToString
{
    function __toString(){
        return "Ви використовуєте об’єкт ClToString як рядок".PHP_EOL.PHP_EOL;
    }
}