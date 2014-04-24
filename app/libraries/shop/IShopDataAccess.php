<?php

interface IShopDataAccess
{
    public function getProductPrice($id);
    public function save($id, $order);
}