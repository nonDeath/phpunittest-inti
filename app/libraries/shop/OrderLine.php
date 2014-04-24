<?php namespace App\Libraries\Shop;

class OrderLine
{
    private $id;
    private $quantity;
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function getTotal()
    {
        $unitPrice = $this->order->getDataAccess()->getProductPrice($this->id);
        $total = $unitPrice * $this->quantity;

        return $total;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of quantity.
     *
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the value of quantity.
     *
     * @param mixed $quantity the quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}