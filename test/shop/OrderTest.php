<?php
use \InvalidArgumentException;
use App\Libraries\Shop\Order;
use App\Libraries\Shop\Product;

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
        $o->getOrderLines()->addOrderLine(2, 4);

        $this->assertEquals(2, sizeof($o->getOrderLines()->getList()));
    }


    public function testOrderCalculateTotal()
    {
        $data = new StubShopDataAccess;

        $o = new Order(1, $data);

        $o->getOrderLines()->addOrderLine(1, 1);

        $total = $o->getOrderLines()->getList()[0]->getTotal();

        $this->assertEquals(25, $total);
    }


    public function testOrderCalculateSomeTotals()
    {
        $data = new StubShopDataAccess;

        $o = new Order(1, $data);

        $o->getOrderLines()->addOrderLine(1, 3);
        $o->getOrderLines()->addOrderLine(2, 5);
        $o->getOrderLines()->addOrderLine(3, 1);

        $total = $o->getOrderLines()->getList()[0]->getTotal();
        $total1 = $o->getOrderLines()->getList()[1]->getTotal();
        $total2 = $o->getOrderLines()->getList()[2]->getTotal();

        $this->assertEquals(75, $total);
        $this->assertEquals(125, $total1);
        $this->assertEquals(25, $total2);
    }

    public function testOrderCalculateTotalWithProduct()
    {
        $data = new FakeShopDataAccess;

        $o = new Order(1, $data);

        $p[] = new Product(1, 148);

        $data->setProducts($p);

        $o->getOrderLines()->addOrderLine(1, 2);

        $total = $o->getOrderLines()->getList()[0]->getTotal();

        $this->assertEquals(296, $total);
    }

    public function testOrderCalculateSomeTotalsWithSomeProducts()
    {
        $data = new FakeShopDataAccess;

        $o = new Order(1, $data);

        $p[] = new Product(1, 148);
        $p[] = new Product(2, 14.5);

        $data->setProducts($p);

        $o->getOrderLines()->addOrderLine(1, 2);
        $o->getOrderLines()->addOrderLine(2, 3);

        $total[] = $o->getOrderLines()->getList()[0]->getTotal();
        $total[] = $o->getOrderLines()->getList()[1]->getTotal();

        $this->assertEquals(296, $total[0]);
        $this->assertEquals(43.5, $total[1]);
    }

    public function testOrderSaved()
    {
        $data = new SpyShopDataAccess;

        $o = new Order(5, $data);

        $o->getOrderLines()->addOrderLine(1, 2);

        $o->save();

        $this->assertTrue($data->getSaved());
    }
}