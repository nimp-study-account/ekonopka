<?php
namespace Ekonopka\Exercise\HomeTask1\models;

/**
 * Class ClToString
 * @package Ekonopka\Exercise\HomeTask1\models
 * запускається при спробі використання unset(), на неіснуюче, захищене або приватне властивість об'єкта.
 */
class ClUnset
{
    protected $closeProp = 'passwd';

    public function __unset($prop)
    {
        unset($this->$prop);
    }

    /**
     * @return string
     */
    public function getCloseProp() : string
    {
        if (empty($this->closeProp)){
            return 'властивість очищена';
        }
        return $this->closeProp . PHP_EOL;
    }
}