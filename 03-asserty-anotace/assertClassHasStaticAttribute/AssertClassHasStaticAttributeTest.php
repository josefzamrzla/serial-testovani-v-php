<?php
class ClassWithStaticAttr
{
    private $privateAttr;
    public $publicAttr;
    public static $staticAttr;
}

class AssertClassHasStaticAttributeTest extends PHPUnit_Framework_TestCase
{
    public function testAssertClassHasStaticAttribute()
    {
        $this->assertClassHasStaticAttribute("staticAttr", "ClassWithAttrs");

        // fails
        // $this->assertClassHasStaticAttribute("privateAttr", "ClassWithAttrs");
        // $this->assertClassHasStaticAttribute("publicAttr", "ClassWithAttrs");
    }
}