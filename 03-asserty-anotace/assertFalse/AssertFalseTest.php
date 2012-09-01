<?php
class AssertFalseTest extends PHPUnit_Framework_TestCase
{
    public function testAssertFalse()
    {
        $this->assertFalse((1 > 2));
        $this->assertFalse(strlen("foo") > 10);

        // fails - conditions are not bool(false)
        // $this->assertFalse("");
        // $this->assertFalse(null);
    }
}