<?php
class AssertStringEndsWithTest extends PHPUnit_Framework_TestCase
{
    public function testAssertStringEndsWith()
    {
        $this->assertStringEndsWith("ring", "prefixedString");
    }
}