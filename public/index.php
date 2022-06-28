<?php
session_start();
use app\models\entities\{Product, User, Basket};
use app\engine\{Render, Request, TwigRender};




include "../engine/Autoload.php";
include "../config/config.php";
require_once '../vendor/autoload.php';

spl_autoload_register([new Autoload(), "loadClass"]);

try {
$request = new Request();
$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = @$request->getControllerName() ?: 'product';
$actionName = @$request->getActionName();

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    die("Нет такого контроллера");
}

} catch (PDOException $e) {
    var_dump($e->getMessage());
} catch(Exception $e){
    var_dump($e);
}













