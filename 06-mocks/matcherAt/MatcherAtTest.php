<?php
class MatcherAtTest extends PHPUnit_Framework_TestCase
{
    public function testMatcherAt()
    {
        $mock = $this->getMock("stdClass", array("foo"));
        $mock->expects($this->at(0))
            ->method("foo")
            ->with(1, 2, 3);

        $mock->expects($this->at(1))
            ->method("foo")
            ->with(4, 5, 6);

        $mock->foo(1, 2, 3);
        $mock->foo(4, 5, 6);
    }
}