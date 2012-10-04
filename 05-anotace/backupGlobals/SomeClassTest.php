<?php
require_once "SomeClass.php";

/**
 * @backupStaticAttributes enabled
 * @backupGlobals enabled
 */
class SomeClassTest extends PHPUnit_Framework_TestCase
{
    public function testGlobalValue()
    {
        $object = new SomeClass();
        $this->assertEquals(10, $object->getGlobalValue());
    }

    public function testGlobalValueSecondTest()
    {
        $object = new SomeClass();
        $this->assertEquals(10, $object->getGlobalValue());
    }

    public function testStaticValue()
    {
        $object = new SomeClass();
        $this->assertEquals(1, $object->getStaticValue());
    }

    public function testStaticValueSecondTest()
    {
        $object = new SomeClass();
        $this->assertEquals(1, $object->getStaticValue());
    }
}