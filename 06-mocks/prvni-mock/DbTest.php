<?php
require_once "Logger.php";
require_once "Db.php";

class DbTest extends PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $loggerMock = $this->getMock("Logger");
        $loggerMock->expects($this->once())
            ->method("log")
            ->with($this->equalTo("Query: foofoo"))
            ->will($this->returnValue(true));

        $db = new Db($loggerMock);
        $db->execute("foofoo");
    }

}