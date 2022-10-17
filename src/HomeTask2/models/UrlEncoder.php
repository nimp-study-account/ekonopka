<?php
namespace Ekonopka\Exercise\HomeTask2\models;
use Ekonopka\Exercise\HomeTask2\models\interfaces\IUrlEncoder;

class UrlEncoder implements IUrlEncoder
{

    public function encode(string $url): string
    {
        // TODO: Implement encode() method.
        return 'DO encode this URL :' . $url;
    }
}