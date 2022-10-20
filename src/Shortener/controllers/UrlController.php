<?php

namespace Ekonopka\Exercise\Shortener\controllers;

use Ekonopka\Exercise\Shortener\models\UrlDecoder;
use Ekonopka\Exercise\Shortener\models\UrlEncoder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class UrlController
{
    public $logger;

    public function __construct()
    {
        //створення объекту лог-классу для контреллера
        $this->initLog();
    }

    /**
     * @param string $url
     * кодування посилання та його запис
     */
    public function actionEncode(string $url)
    {
        $this->logger->info('start Encoding url : ' . $url);

        $encode = new UrlEncoder();
        $encode->length = 5;

        try {
            $code = $encode->encode($url);
        }catch (\InvalidArgumentException $e){
            $this->logger->error($e->getMessage() . ' url : ' . $url);
            exit;
        }

        //якщо в базі нема такого посылання
        if($encode->isNewRecord){
            $encode->save([$url => $code]);

            $this->logger->info('save code : '. $code);
        }

        echo $code;
    }

    /**
     * @param string $short_url
     * отримання поссилання за кодом
     */
    public function actionDecode(string $short_url)
    {
        $decoder = new UrlDecoder();
        try {
            $res = $decoder->decode($short_url);
        }catch (\InvalidArgumentException $e){

            $this->logger->warning($e->getMessage() . ' code : ' . $short_url);

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