<?php
class AssertEmptyTest extends PHPUnit_Framework_TestCase
{
    public function testAssertEmpty()
    {
        $this->assertEmpty(null);
        $this->assertEmpty(0);
        $this->assertEmpty("");
        $this->assertEmpty(false);
        $this->assertEmpty(array());
    }
}