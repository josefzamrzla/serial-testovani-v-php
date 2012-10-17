<?php
class ThrowExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowException()
    {
        $exception = new InvalidArgumentException();

        $mock = $this->getMock("stdClass", array("foo"));
        $mock->expects($this->once())
            ->method("foo")
            ->will($this->throwException($exception));

        $mock->foo();
    }
}