<?php
require_once "Worker.php";

class WorkerTest extends PHPUnit_Framework_TestCase
{
    public function testCheckResult()
    {
        $mock = $this->getMock("Worker", array("work"));
        $mock->expects($this->at(0))
            ->method("work")
            ->will($this->returnValue(true));

        $mock->expects($this->at(1))
            ->method("work")
            ->will($this->returnValue(false));

        $this->assertEquals("OK", $mock->checkResults());
        $this->assertEquals("NOT YET", $mock->checkResults());
    }
}