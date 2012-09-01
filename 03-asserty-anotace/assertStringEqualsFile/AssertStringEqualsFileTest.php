<?php
class AssertStringEqualsFileTest extends PHPUnit_Framework_TestCase
{
    public function testAssertStringEqualsFile()
    {
        $this->assertStringEqualsFile(__DIR__."/file.txt", "foo bar");
    }
}