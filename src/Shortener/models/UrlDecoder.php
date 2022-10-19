<?php
namespace Ekonopka\Exercise\Shortener\models;
use Ekonopka\Exercise\Shortener\models\interfaces\IUrlDecoder;

class UrlDecoder implements IUrlDecoder
{

    public function decode(string $code): string
    {
        // TODO: Implement decode() method.
        return 'DO decode this URL :' . $code;
    }
}