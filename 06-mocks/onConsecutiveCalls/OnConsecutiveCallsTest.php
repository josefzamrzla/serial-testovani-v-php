<?php
class OnConsecutiveCallsTest extends PHPUnit_Framework_TestCase
{
    public function testOnConsecutiveCalls()
    {
        $mock = $this->getMock("stdClass", array("getValue"));
        $mock->expects($this->exactly(4))
            ->method("getValue")
            ->will($this->onConsecutiveCalls(5, 3, 1));

        $this->assertSame(5, $mock->getValue());
        $this->assertSame(3, $mock->getValue());
        $this->assertSame(1, $mock->getValue());
        $this->assertSame(null, $mock->getValue());
    }
}