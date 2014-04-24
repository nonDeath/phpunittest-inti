<?php

require 'vendor/autoload.php';

class OrderTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $data = null;

        $o = new Order(1, $data);

        $this->assertFalse($o===null);
    }
}