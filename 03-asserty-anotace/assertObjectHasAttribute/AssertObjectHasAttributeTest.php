<?php
class ObjectType
{
    private $privateAttr;
    public $publicAttr;
    public static $staticAttr;
}

class AssertObjectHasAttributeTest extends PHPUnit_Framework_TestCase
{
    public function testAssertObjectHasAttribute()
    {
        $object = new ObjectType();
        $this->assertObjectHasAttribute("privateAttr", $object);
        $this->assertObjectHasAttribute("publicAttr", $object);
        $this->assertObjectHasAttribute("staticAttr", $object);
    }
}