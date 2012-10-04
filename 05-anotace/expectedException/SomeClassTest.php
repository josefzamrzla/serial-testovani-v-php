<?php
require_once "SomeClass.php";

class SomeClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionIsThrown()
    {
        $s = new SomeClass();
        $s->throwsInvalidArgumentException();
    }

    /**
     * @expectedException Exception
     */
    public function testExceptionIsNotThrownButTestIsOk()
    {
        $s = new SomeClass();
        $s->shouldThrowExceptionButDoesNot();
    }
}