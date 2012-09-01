<?php
class AssertTrueTest extends PHPUnit_Framework_TestCase
{
    public function testAssertTrue()
    {
        $this->assertTrue((1 < 2));
        $this->assertTrue(strlen("foo") > 1);

        // fails - int(1) is not bool(true)
        // $this->assertTrue(1);
    }
}