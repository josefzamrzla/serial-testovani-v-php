<?php
class ReturnArgumentTest extends PHPUnit_Framework_TestCase
{
    public function testReturnArgument()
    {
        $mock = $this->getMock("stdClass", array("foo"));
        $mock->expects($this->once())
            ->method("foo")
            ->with("bar", "baz")
            ->will($this->returnArgument(0));

        $this->assertEquals("bar", $mock->foo("bar", "baz"));
    }
}