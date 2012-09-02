<?php
class AssertStringStartsWithTest extends PHPUnit_Framework_TestCase
{
    public function testAssertStringStartsWith()
    {
        $this->assertStringStartsWith("prefix", "prefixedString");
    }
}