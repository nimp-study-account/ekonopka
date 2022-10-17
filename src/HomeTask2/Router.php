<?php
namespace Ekonopka\Exercise\HomeTask2;

class Router
{
    protected $action;
    protected  $params;
    /**
     * @var \ReflectionClass
     */
    private $reflectionClass;

    public function __construct(){
        $this->setAction();
        $this->reflectionClass = new \ReflectionClass(self::class);
        //TODO реалізувати підключення до БД
    }

    public function run(){
        $controllerName =
            $this->reflectionClass->getNamespaceName() .'\\'. 'UrlController';
        //TODO реалізувати перемикання між контролерами

        $controllerObject = new $controllerName;

        call_user_func_array(array($controllerObject, $this->action),[$this->params]);

    }




    protected function setAction()
    {
        $this->action = $this->prepare(readline('виберіть дію :'));
        $this->params = readline('введіть посилання');
    }

    protected function prepare($srt) :string
    {
        $srt = trim($srt);
        $srt = strtolower($srt);
        $srt = ucfirst($srt);
        return 'action' . $srt;
    }

}