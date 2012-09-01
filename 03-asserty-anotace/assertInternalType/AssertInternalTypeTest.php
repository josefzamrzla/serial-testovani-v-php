<?php
class AssertInternalTypeTest extends PHPUnit_Framework_TestCase
{
    public function testAssertInternalType()
    {
        $this->assertInternalType("int", 1);
        $this->assertInternalType("string", "1");
        $this->assertInternalType("bool", true);
        $this->assertInternalType("null", null);
        $this->assertInternalType("object", new stdClass());
    }
}