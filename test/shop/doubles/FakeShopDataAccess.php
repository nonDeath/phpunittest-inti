<?php

use App\Libraries\Shop\IShopDataAccess;
use App\Libraries\Shop\Product;

class FakeShopDataAccess implements IShopDataAccess
{
    private $products;

    public function __construct()
    {
        $this->products = array();
    }

    public function getProductPrice($id) {
        $p = $this->findProductById($id);

        if($p === null) {
            throw new Exception("No encontre un producto con id: {$id}.");
        }

        return $p->getUnitPrice();

    }

    public function save($id, $order) {
        // TODO Auto-generated method stub
        throw new Exception("save no implementado.");
    }

    public function findProductById($id)
    {
        if(sizeof($this->products) > 0) {



            foreach ($this->products as $product) {
                if($product->getId() == $id) {
                    return $product;
                }
            }
        }

        return null;
    }

    /**
     * Gets the value of products.
     *
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the value of products.
     *
     * @param mixed $products the products
     *
     * @return self
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }
}