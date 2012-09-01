<?php
class AssertGreaterThanOrEqualTest extends PHPUnit_Framework_TestCase
{
    public function testAssertGreaterThanOrEqual()
    {
        $this->assertGreaterThanOrEqual(1, 2);
        $this->assertGreaterThanOrEqual(1, "2");
        $this->assertGreaterThanOrEqual(1, 1);

        $this->assertGreaterThanOrEqual("a", "c");
        $this->assertGreaterThanOrEqual("a", "a");
    }
}