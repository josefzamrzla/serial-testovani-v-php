<?php
class Item
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class AssertContainsTest extends PHPUnit_Framework_TestCase
{
    private $traversableArray;

    protected function setUp()
    {
        $this->traversableArray = new ArrayIterator(array("foo", "bar", "baz"));
    }

    public function testAssertContains()
    {
        $this->assertContains("bar", "foo bar baz");
        $this->assertContains("foo", array("foo", "bar"));
        $this->assertContains("baz", $this->traversableArray);
    }

    public function testAssertContainsWithIgnoreCase()
    {
        $this->assertContains("BAR", "foo bar baz", "Assert string contains", true);

        // fails - ignoreCase works only with strings
        //$this->assertContains("FOO", array("foo", "bar"), "Assert array contains", true);
        //$this->assertContains("BAZ", $this->traversableArray, "Assert iterator contains", true);
    }

    public function testAssertContainsWithObjectIdentity()
    {
        $sameItem = new Item(1);
        $this->assertContains($sameItem, array($sameItem, new Item(2), new Item(3)), "Assert string contains", true, true);
    }
}