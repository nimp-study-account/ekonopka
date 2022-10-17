<?php

namespace Ekonopka\Exercise\HomeTask2\models\interfaces;


interface IUrlDecoder
{
    /**
     * @param string $code
     * @throws \InvalidArgumentException
     * @return string
     */
    public function decode(string $code): string;
}