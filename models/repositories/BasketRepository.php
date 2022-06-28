<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\Repository;
use app\models\entities\Basket;

class BasketRepository extends Repository
{
    public static function getBasket($session_id)
    {
        $sql = "SELECT basket.id as basket_id, catalog.id prod_id, catalog.name, catalog.description, catalog.price FROM `basket`,`catalog` WHERE `session_id` = :session_id AND basket.good_id = catalog.id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    protected  function getTableName()
    {
        return "basket";
    }

    protected  function getEntityClass()
    {
        return Basket::class;
    }
}