<?php
class MyType {}

class AssertInstanceOfTest extends PHPUnit_Framework_TestCase
{
    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf("MyType", new MyType());
        $this->assertInstanceOf("stdClass", new stdClass());
    }
}