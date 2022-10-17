<?php

namespace Ekonopka\Exercise\HomeTask2;


use Ekonopka\Exercise\HomeTask2\models\UrlDecoder;
use Ekonopka\Exercise\HomeTask2\models\UrlEncoder;

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