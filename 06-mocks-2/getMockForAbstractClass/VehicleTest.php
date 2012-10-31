<?php
require_once "Vehicle.php";

class VehicleTest extends PHPUnit_Framework_TestCase
{
    public function testCanFly()
    {
        $mock = $this->getMockForAbstractClass("Vehicle");
        $mock->expects($this->once())
            ->method("hasWings")
            ->will($this->returnValue(false));

        $this->assertFalse($mock->canFly());
    }
}