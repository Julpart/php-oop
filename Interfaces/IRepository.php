<?php
namespace app\Interfaces;

interface IRepository{
    public  function getOne($id);
    public  function getAll();
  
}