<?php
class AssertLessThanTest extends PHPUnit_Framework_TestCase
{
    public function testAssertLessThan()
    {
        $this->assertLessThan(2, 1);
        $this->assertLessThan(2, "1");

        // fails
        // $this->assertLessThan(1, 1);

        $this->assertLessThan("c", "a");

        // fails
        // $this->assertLessThan("a", "a");
    }
}