<?php
namespace Ekonopka\Exercise\Shortener\models;
use Ekonopka\Exercise\Shortener\models\interfaces\IUrlEncoder;


class UrlEncoder extends ActiveFileData implements IUrlEncoder
{
    public int $length = 8;

    public function encode($url): string
    {

        $this->UrlValidate($url);
        try {
            $code = $this->getCodByUrl($url);
        } catch (\Exception $e) {
            $this->isNewRecord = true;
            $code = $this->generateCode();
        }
        return $code;
    }

    protected function UrlValidate($url): bool
    {
        if(empty($url) || !filter_var($url, FILTER_VALIDATE_URL))
        {
            throw new \InvalidArgumentException('Url is broken');
        }

        return true;
    }

    public function getResponseUrl($url): bool
    {
        //TODO релізувати додаткову перевірку якою за бажанням можна користуватись в контроллері
        return true;
    }

    protected function generateCode() : string
    {
        return substr(uniqid(), 0 , $this->length);
    }

    public function getCodByUrl($url)
    {
        if(!array_key_exists($url, $this->getData())){
            throw new \Exception();
        }
        return $this->getData()[$url];
    }


}