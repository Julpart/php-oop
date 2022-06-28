<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\Repository;
use app\models\entities\Product;

class ProductRepository extends Repository
{
    protected function getTableName()
    {
        return "catalog";
    }

    protected  function getEntityClass()
    {
        return Product::class;
    }
}