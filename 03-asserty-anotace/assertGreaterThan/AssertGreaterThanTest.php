<?php
class AssertGreaterThanTest extends PHPUnit_Framework_TestCase
{
    public function testAssertGreaterThan()
    {
        $this->assertGreaterThan(1, 2);
        $this->assertGreaterThan(1, "2");

        // fails
        // $this->assertGreaterThan(1, 1);

        $this->assertGreaterThan("a", "c");

        // fails
        // $this->assertGreaterThan("a", "a");
    }
}