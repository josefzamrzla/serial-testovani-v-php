<?php
class AssertStringMatchesFormatTest extends PHPUnit_Framework_TestCase
{
    public function testAssertStringMatchesFormat()
    {
        $this->assertStringMatchesFormat("%s", "foo bar");
    }
}