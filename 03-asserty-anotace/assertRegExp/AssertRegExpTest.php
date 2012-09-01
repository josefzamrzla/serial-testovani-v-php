<?php
class AssertRegExpTest extends PHPUnit_Framework_TestCase
{
    public function testAssertRegExp()
    {
        $this->assertRegExp("|[0-9]+|", "123");
    }
}