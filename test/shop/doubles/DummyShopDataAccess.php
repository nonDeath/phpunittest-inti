<?php

use App\Libraries\Shop\IShopDataAccess;

class DummyShopDataAccess implements IShopDataAccess
{
    public function getProductPrice($id) {
        throw new Exception("getProductPrice no implementado.");

        // TODO Auto-generated method stub
        // return 0;

    }

    public function save($id, $order) {
        // TODO Auto-generated method stub
        throw new Exception("save no implementado.");
    }
}