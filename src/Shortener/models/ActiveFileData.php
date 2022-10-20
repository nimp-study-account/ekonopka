<?php


namespace Ekonopka\Exercise\Shortener\models;


use Ekonopka\Exercise\Shortener\models\interfaces\ActiveData;

class ActiveFileData implements ActiveData
{
    const FILE_DB = 'fileDb';

    private array $data = [];
    protected array $config;
    public bool $isNewRecord = false;

    public function __construct()
    {
        $this->setConfig();
        $this->setData();
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    protected function getDb()
    {
        return $this->config[self::FILE_DB];
    }

    private function setConfig()
    {
        $this->config = include(__DIR__ . '/../config/params.php');
    }

    private function setData()
    {
            $content = file_get_contents($this->getDb());
            $this->data = (array) json_decode($content, true);
    }

    /**
     * @param array $arr
     */
    public function save(array $arr)
    {
        $content = json_encode(array_merge($arr, $this->getData()));
        $file = fopen($this->getDb(), 'w+');
        fwrite($file, $content);
        fclose($file);
    }
}