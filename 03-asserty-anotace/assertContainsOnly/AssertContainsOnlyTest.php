<?php
class ItemType {}

class AssertContainsOnlyTest extends PHPUnit_Framework_TestCase
{
    public function testAssertContainsOnly()
    {
        $this->assertContainsOnly("string", array("foo", "bar"));
        $this->assertContainsOnly("int", array(1, 2));
        $this->assertContainsOnly("ItemType", array(new ItemType(), new ItemType()));
    }
}