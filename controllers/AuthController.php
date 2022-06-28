<?php

namespace app\controllers;

use app\models\repositories\UserRepository;
use app\engine\{Request, Session};

class AuthController extends Controller
{


    public function actionLogin()
    {
        $session = new Session();

        $login = (new Request())->getParams()['login'];
        $password = (new Request())->getParams()['password'];
        if ((new UserRepository())->Auth($login, $password)) {
            $session->set('authTry', false);
        } else {
            $session->set('authTry', true);
        }
        header("Location: /");
        die();
    }
    public function actionLogout()
    {
        $session = new Session();
        $session->regenerate_id();
        $session->destroy();
        header("Location: /");
        die();
    }
}
