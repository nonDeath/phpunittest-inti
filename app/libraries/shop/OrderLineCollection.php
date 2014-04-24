<?php namespace App\Libraries\Shop;

class OrderLineCollection
{
    private $list = array();

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function addOrderLine($id, $quantity)
    {
        $ol = new OrderLine($this->getOrder());

        $ol->setId($id)
            ->setQuantity($quantity);

        $this->list[] = $ol;
    }



    /**
     * Gets the value of list.
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Sets the value of list.
     *
     * @param mixed $list the list
     *
     * @return self
     */
    public function setList($list)
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Gets the value of order.
     *
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets the value of order.
     *
     * @param mixed $order the order
     *
     * @return self
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }
}