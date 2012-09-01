<?php
class AssertNullTest extends PHPUnit_Framework_TestCase
{
    public function testAssertNull()
    {
        $this->assertNull(null);

        // fails
        // $this->assertNull(0);
        // $this->assertNull("");
    }
}