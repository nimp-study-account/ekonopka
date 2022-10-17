<?php
namespace Ekonopka\Exercise\HomeTask2\models;
use Ekonopka\Exercise\HomeTask2\models\interfaces\IUrlDecoder;

class UrlDecoder implements IUrlDecoder
{

    public function decode(string $code): string
    {
        // TODO: Implement decode() method.
        return 'DO decode this URL :' . $code;
    }
}