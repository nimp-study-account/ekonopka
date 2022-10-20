<?php
namespace Ekonopka\Exercise\Shortener\models;
use Ekonopka\Exercise\Shortener\models\interfaces\IUrlDecoder;

class UrlDecoder extends UrlEncoder implements IUrlDecoder
{

    public function decode(string $code): string
    {
        if(!$url = array_search($code, $this->getData())){
            throw new \InvalidArgumentException('Url not found');
        }
        return $url;
    }
}