<?php
class AssertEqualsTest extends PHPUnit_Framework_TestCase
{
    public function testEquals()
    {
        $this->assertEquals("foo", "foo");
        $this->assertEquals(10, "10");
        $this->assertEquals(null, "");
        $this->assertEquals(null, 0);

        $this->assertEquals(array("0" => "foo", "1" => "bar"), array("1" => "bar", "0" => "foo"));
    }

    public function testEqualsWithDelta()
    {
        $this->assertEquals(100, 101, "Assert equals with delta:1", 1);
        // fails - delta is > 1
        // $this->assertEquals(100, 102, "Assert equals with delta:1", 1);
    }

    public function testEqualsWithCanonicalizeFlag()
    {
        $this->assertEquals(array(1, 2, 3), array(3, 1, 2), "Arrays are equal", 0, 10, true);

        // fails
        // $this->assertEquals(array(1, 2, 3), array(3, 1, 2), "Arrays are equal", 0, 10, false);
    }

    public function testEqualsWithIgnoreCase()
    {
        $this->assertEquals("abcd", "AbCd", "Strings are equal", 0, 10, false, true);
        $this->assertEquals(array("abcd"), array("AbCd"), "Strings are equal", 0, 10, false, true);

        // fails
        // $this->assertEquals("abcd", "AbCd", "Strings are equal", 0, 10, false, false);
        // $this->assertEquals(array("abcd"), array("AbCd"), "Strings are equal", 0, 10, false, false);
    }
}