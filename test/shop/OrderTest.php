<?php
use \InvalidArgumentException;
use App\Libraries\Shop\Order;

class OrderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Comprueba la creacion de una Orden
     * @expectedException InvalidArgumentException
     */
    public function testThrowInvalidArgumentExceptionOnCreateNewOrder()
    {
        $data = null;

        $o = new Order(1, $data);

        $this->assertFalse($o===null);
    }

    public function testCreateNewOrder()
    {
        $data = new DummyShopDataAccess;

        $o = new Order(1, $data);

        $this->assertFalse($o===null);
    }

    public function testOrderAddOrdersLines()
    {
        $data = new DummyShopDataAccess;

        $o = new Order(1, $data);

        $o->getOrderLines()->addOrderLine(1, 1);

        $this->assertEquals(1, sizeof($o->getOrderLines()->getList()));
    }

}