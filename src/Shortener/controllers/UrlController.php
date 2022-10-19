<?php

namespace Ekonopka\Exercise\Shortener\controllers;


use Ekonopka\Exercise\Shortener\models\UrlDecoder;
use Ekonopka\Exercise\Shortener\models\UrlEncoder;

class UrlController
{

    public function actionEncode($url)
    {
        $encode = new UrlEncoder();
        echo $encode->encode($url);
    }

    public function actionDecode($short_url)
    {
        $decoder = new UrlDecoder();
        echo $decoder->decode($short_url);
    }
}