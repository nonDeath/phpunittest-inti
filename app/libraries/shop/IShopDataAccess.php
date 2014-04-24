<?php namespace App\Libraries\Shop;

interface IShopDataAccess
{
    public function getProductPrice($id);
    public function save($id, $order);
}