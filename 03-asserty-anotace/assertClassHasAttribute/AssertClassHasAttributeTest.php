<?php
class ClassWithAttrs
{
    private $privateAttr;
    public $publicAttr;
    public static $staticAttr;
}

class AssertClassHasAttributeTest extends PHPUnit_Framework_TestCase
{
    public function testAssertClassHasAttribute()
    {
        $this->assertClassHasAttribute("privateAttr", "ClassWithAttrs");
        $this->assertClassHasAttribute("publicAttr", "ClassWithAttrs");
        $this->assertClassHasAttribute("staticAttr", "ClassWithAttrs");
    }
}