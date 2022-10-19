<?php
namespace Ekonopka\Exercise;
require_once __DIR__.'/../vendor/autoload.php';

use Ekonopka\Exercise\Shortener\Router;

$obj = new Router();
$obj->run();



echo PHP_EOL;