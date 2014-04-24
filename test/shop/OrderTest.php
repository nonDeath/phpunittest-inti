<?php

require 'vendor/autoload.php';

class OrderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Comprueba la creacion de una Orden
     * @expectedException InvalidArgumentException
     */
    public function test()
    {
        $data = null;

        $o = new Order(1, $data);

        $this->assertFalse($o===null);
    }
}