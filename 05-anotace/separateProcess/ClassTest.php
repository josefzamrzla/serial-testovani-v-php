<?php
require_once "ClassOne.php";
require_once "ClassTwo.php";

/**
 * @ runTestsInSeparateProcesses
 */
class ClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testOne()
    {
        $one = new ClassOne();
        $this->assertEquals("my const value", $one->getMyConstant());
    }

    public function testTwo()
    {
        $two = new ClassTwo();
        $this->assertEquals("my const value", $two->getMyConstant());
    }
}