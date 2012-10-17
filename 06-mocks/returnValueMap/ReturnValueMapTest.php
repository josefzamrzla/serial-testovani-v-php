<?php
class ReturnValueMapTest extends PHPUnit_Framework_TestCase
{
    public function testReturnValueMap()
    {
        $map = array(
            array(1, 2, 3),
            array(2, 2, 4),
            array(5, 5, 10));

        $mock = $this->getMock("stdClass", array("calc"));
        $mock->expects($this->any())
            ->method("calc")
            ->will($this->returnValueMap($map));

        $this->assertSame(10, $mock->calc(5, 5));
        $this->assertSame(4, $mock->calc(2, 2));


        $this->assertNull($mock->calc(5, 6));
    }
}