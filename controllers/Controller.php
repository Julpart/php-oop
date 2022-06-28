<?php

namespace app\controllers;


use app\models\repositories\{UserRepository,BasketRepository};
use app\engine\Session;
use app\interfaces\IRender;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $render;
    protected $session;


    public function __construct(IRender $render)
    {
        $this->render = $render;
    }





    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die("404");
        }
    }

    public function render($template, $params = [])
    {
        $session = new Session();
        
        return $this->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu', [
                'userName' => (new UserRepository())->getName(),
                'isAuth' => (new UserRepository())->isAuth(),
                'authTry' => $session->get('authTry'),
                'count' => (new BasketRepository())->getCountWhere('session_id', $session->getId())
            ]),
            'content' => $this->renderTemplate($template, $params)
        ]);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}
