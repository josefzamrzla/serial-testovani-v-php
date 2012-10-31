<?php
require_once 'vfsStream/vfsStream.php';
require_once "Logger.php";

class LoggerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    protected function setUp()
    {
        $this->root = vfsStream::setup("logs");
    }

    /**
     * test that the directory is created
     */
    public function testDirectoryIsCreated()
    {
        $logger = new Logger(vfsStream::url("logs"));
        $logger->log("Log message");
        $logger->log("Next message");

        $logFile = $this->root->getChild("log.txt");
        $this->assertEquals("Log message\nNext message\n", $logFile->getContent());


    }
}