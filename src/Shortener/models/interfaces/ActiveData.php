<?php


namespace Ekonopka\Exercise\Shortener\models\interfaces;


interface ActiveData
{

    /**
     * @param array $arr
     */
    public function save(array $arr);

    /**
     * @return array
     */
    public function getData(): array ;


}