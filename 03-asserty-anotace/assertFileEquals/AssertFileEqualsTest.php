<?php
class assertFileEqualsTest extends PHPUnit_Framework_TestCase
{
    public function testAssertFileEquals()
    {
        $this->assertFileEquals(__DIR__."/file1.txt", __DIR__."/file2.txt");
    }
}