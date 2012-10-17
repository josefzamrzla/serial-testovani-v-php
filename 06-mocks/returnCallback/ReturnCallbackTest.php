<?php
class ReturnCallbackTest extends PHPUnit_Framework_TestCase
{
    public function testReturnCallback()
    {
        $mock = $this->getMock("stdClass", array("calc"));
        $mock->expects($this->exactly(3))
            ->method("calc")
            ->will($this->returnCallback(
                function($x, $y) {
                    return $x + $y;
                }
            )
        );

        $this->assertSame(3, $mock->calc(1, 2));
        $this->assertSame(0, $mock->calc(-2, 2));
        $this->assertSame(0, $mock->calc(0, 0));
    }

    public function testReturnForeignCallback()
    {
        $mock = $this->getMock("stdClass", array("calc"));
        $mock->expects($this->exactly(3))
            ->method("calc")
            ->will($this->returnCallback(array($this, "calcCallback")));

        $this->assertSame(1, $mock->calc(0, 1));
        $this->assertSame(2, $mock->calc(-2, 4));
        $this->assertSame(3, $mock->calc(3, 0));
    }

    public function calcCallback($x, $y)
    {
        return $x + $y;
    }
}