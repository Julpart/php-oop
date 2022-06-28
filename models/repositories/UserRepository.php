<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\Repository;
use app\models\entities\User;


class UserRepository extends Repository
{
    protected function getTableName()
    {
        return "users";
    }

    protected  function getEntityClass()
    {
        return User::class;
    }

    public  function Auth($login, $password)
    {
        $user = $this->getWhere('login', $login);
        if ($user == false) return false;
        if (password_verify($password,$user->password)) {
            $session = new Session();
            $session->set('login',$login);
            return true;
        } else return false;
    }
    public function getName()
    {
        $session = new Session();
        return  $session->get('login');;
    }
    public function isAuth()
    {
        $session = new Session();
        $sess = $session->get('login');
        return isset($sess);
    }
}