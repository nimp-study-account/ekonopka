<?php

namespace Ekonopka\Exercise\Shortener\controllers;

use Ekonopka\Exercise\Shortener\models\UrlDecoder;
use Ekonopka\Exercise\Shortener\models\UrlEncoder;
use http\Exception\InvalidArgumentException;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class UrlController
{
    public $logger;

    public function __construct()
    {
        $this->initLog();
    }

    public function actionEncode($url)
    {
        $encode = new UrlEncoder();
        $encode->length = 5;
        $code = $encode->encode($url);

        if($encode->isNewRecord){
            $encode->save([$url => $code]);
        }
        $this->logger->error('Logger is now Ready');
        echo $code;
    }

    public function actionDecode($short_url)
    {
        $decoder = new UrlDecoder();
        try {
            $res = $decoder->decode($short_url);
        }catch (InvalidArgumentException $e){
           $res = $e->getMessage();
        }

        echo $res;
    }

    protected function initLog()
    {
        $logger = new Logger('url-logger');
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../runtime/logs/url.log', Logger::DEBUG));
        $this->logger = $logger;
    }
}