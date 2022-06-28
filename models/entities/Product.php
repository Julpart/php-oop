<?php

namespace app\models\entities;
use app\models\Model;


class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $likes;
    protected $path;

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'likes' => false,
        'path' =>false
    ];


    public function __construct($name = null, $description = null,$price = null, $likes = null,$path = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->likes = $likes;
        $this->path = $path;
    }



 
}
