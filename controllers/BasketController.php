<?php

namespace app\controllers;

use app\models\repositories\BasketRepository;
use app\engine\{Session, Request};
use app\models\entities\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $session = new Session();
        $session_id = $session->getId();
        $basket = (new BasketRepository())->getBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        $session = new Session();
        $session_id = $session->getId();;


        $basket = new Basket($session_id, $id);

        (new BasketRepository())->save($basket);

        $response = [
            'status' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];
        $session = new Session();
        $session_id = $session->getId();;


        $basket = (new BasketRepository())->getOne($id);

        if ($session_id == $basket->session_id) {
            (new BasketRepository())->delete($basket);
        }

        $response = [
            'status' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}
