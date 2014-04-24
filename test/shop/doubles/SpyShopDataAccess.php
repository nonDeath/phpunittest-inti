<?php

use App\Libraries\Shop\IShopDataAccess;

class SpyShopDataAccess implements IShopDataAccess
{
    private $saved = false;

    public function getProductPrice($id) {

        return 25;

    }

    public function save($id, $order) {
        $this->saved = true;
    }



    /**
     * Gets the value of saved.
     *
     * @return mixed
     */
    public function getSaved()
    {
        return $this->saved;
    }
}