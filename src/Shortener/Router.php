<?php
namespace Ekonopka\Exercise\Shortener;

class Router
{
    protected string $action;
    protected string $params;
    /**
     * @var \ReflectionClass
     */
    private $reflectionClass;

    public function __construct(){
        $this->setAction();
        $this->reflectionClass = new \ReflectionClass(self::class);
    }

    public function run()
    {
        $controllerName =
            $this->reflectionClass->getNamespaceName() .'\\'.'controllers'.'\\'
            . 'UrlController';
        //TODO реалізувати перемикання між контролерами

        $controllerObject = new $controllerName;

        call_user_func_array(array($controllerObject, $this->action),[$this->params]);

    }

    protected function setAction()
    {
        $this->action = $this->prepare(readline('виберіть дію (encode/decode) :'));
        $this->params = readline('введіть посилання або код :');
    }

    protected function prepare($srt) :string
    {
        $srt = trim($srt);
        $srt = strtolower($srt);
        $srt = ucfirst($srt);
        return 'action' . $srt;
    }

}