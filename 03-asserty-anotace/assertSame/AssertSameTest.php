<?php
class AssertSameTest extends PHPUnit_Framework_TestCase
{
    public function testAssertSame()
    {
        $this->assertSame(1, 1);

        // fails - int(1) is not the same as string("1")
        // $this->assertSame(1, "1");

        $this->assertSame(array("0" => "foo", "1" => "bar"), array("0" => "foo", "1" => "bar"));

        // fails - items are not in the same order
        // $this->assertSame(array("0" => "foo", "1" => "bar"), array("1" => "bar", "0" => "foo"));
    }
}