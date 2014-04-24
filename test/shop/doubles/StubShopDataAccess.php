<?php

use App\Libraries\Shop\IShopDataAccess;

class StubShopDataAccess implements IShopDataAccess
{
    public function getProductPrice($id) {
        // TODO Auto-generated method stub
        return 25;

    }

    public function save($id, $order) {
        // TODO Auto-generated method stub
        throw new Exception("save no implementado.");
    }
}