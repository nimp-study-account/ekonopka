<?php


namespace Ekonopka\Exercise\Shortener\models\interfaces;


interface IUrlEncoder
{
    /**
     * @param string $url
     * @throws \InvalidArgumentException
     * @return string
     */
    public function encode(string $url): string;
}