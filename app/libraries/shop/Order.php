<?php
/**
 * Order class
 * Clase que representa una orden de compra
 */
class Order
{
    private $id;
    private $dataAccess;
    private $orderLines;

    public function __construct($id, $dataAccess)
    {
        if(empty($dataAccess)) {
            throw new InvalidArgumentException("dataAccess es nulo!");
        }
        $this->id = $id;
        $this->dataAccess = $dataAccess;

        $this->orderLines = array();
    }

    public function save()
    {
        $this->dataAccess->save($this->id, $this);
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
     * Gets the value of dataAccess.
     *
     * @return mixed
     */
    public function getDataAccess()
    {
        return $this->dataAccess;
    }

    /**
     * Sets the value of dataAccess.
     *
     * @param mixed $dataAccess the data access
     *
     * @return self
     */
    public function setDataAccess($dataAccess)
    {
        $this->dataAccess = $dataAccess;

        return $this;
    }

    /**
     * Gets the value of orderLines.
     *
     * @return mixed
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * Sets the value of orderLines.
     *
     * @param mixed $orderLines the order lines
     *
     * @return self
     */
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;

        return $this;
    }
}