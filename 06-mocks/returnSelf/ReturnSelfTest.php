<?php
class ReturnSelfTest extends PHPUnit_Framework_TestCase
{
    public function testReturnSelf()
    {
        $mock = $this->getMock("stdClass", array("foo", "bar"));
        $mock->expects($this->exactly(2))
            ->method("foo")
            ->will($this->returnSelf());

        $mock->expects($this->once())
            ->method("bar")
            ->will($this->returnSelf());

        $this->assertSame($mock, $mock->foo());
        $this->assertSame($mock, $mock->foo()->bar());
    }
}