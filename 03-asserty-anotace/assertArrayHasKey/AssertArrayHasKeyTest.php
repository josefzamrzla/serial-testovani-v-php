<?php
class AssertArrayHasKeyTest extends PHPUnit_Framework_TestCase
{
    public function testAssertArrayHasKey()
    {
        $this->assertArrayHasKey(1, array(1, 2, 3));
        $this->assertArrayHasKey("foo", array("foo" => "bar"));

        // fails - not an array
        // $this->assertArrayHasKey("foo", "bar");
    }
}