<?php
namespace Ekonopka\Exercise\Shortener\models;
use Ekonopka\Exercise\Shortener\models\interfaces\IUrlEncoder;

class UrlEncoder implements IUrlEncoder
{

    public function encode(string $url): string
    {
        // TODO: Implement encode() method.
        return 'DO encode this URL :' . $url;
    }
}