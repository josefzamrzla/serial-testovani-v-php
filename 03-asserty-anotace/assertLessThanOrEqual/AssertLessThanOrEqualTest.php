<?php
class AssertLessThanOrEqualTest extends PHPUnit_Framework_TestCase
{
    public function testAssertLessThanOrEqual()
    {
        $this->assertLessThanOrEqual(2, 1);
        $this->assertLessThanOrEqual(2, "1");
        $this->assertLessThanOrEqual(1, 1);

        $this->assertLessThanOrEqual("c", "a");
        $this->assertLessThanOrEqual("a", "a");
    }
}