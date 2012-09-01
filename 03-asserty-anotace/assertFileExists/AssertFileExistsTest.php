<?php
class AssertFileExistsTest extends PHPUnit_Framework_TestCase
{
    public function testAssertFileExists()
    {
        $this->assertFileExists(__DIR__."/file.txt");
    }
}