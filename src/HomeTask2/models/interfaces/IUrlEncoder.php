<?php


namespace Ekonopka\Exercise\HomeTask2\models\interfaces;


interface IUrlEncoder
{
    /**
     * @param string $url
     * @throws \InvalidArgumentException
     * @return string
     */
    public function encode(string $url): string;
}