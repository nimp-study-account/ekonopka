<?php
namespace Ekonopka\Exercise\Shortener\models;
use Ekonopka\Exercise\Shortener\models\interfaces\IUrlEncoder;


class UrlEncoder extends ActiveFileData implements IUrlEncoder
{
    //дефолтна кількість символів при кодуванні
    public int $length = 8;

    /**
     * @param string $url
     * @return string
     */
    public function encode(string $url): string
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

    /**
     * @param string $url
     * @return bool
     */
    protected function UrlValidate(string $url): bool
    {
        if(empty($url) || !filter_var($url, FILTER_VALIDATE_URL))
        {
            throw new \InvalidArgumentException('Url is broken');
        }

        return true;
    }

    public function getResponseUrl($url): bool
    {
        //TODO релізувати додаткову перевірку, якою за бажанням, можна користуватись в контроллері
        return true;
    }

    /**
     * @return string
     */
    protected function generateCode() : string
    {
        return substr(uniqid(), 0 , $this->length);
    }

    /**
     * @param string $url
     * @return mixed
     * @throws \Exception
     */
    public function getCodByUrl(string $url)
    {
        if(!array_key_exists($url, $this->getData())){
            throw new \Exception();
        }
        return $this->getData()[$url];
    }


}