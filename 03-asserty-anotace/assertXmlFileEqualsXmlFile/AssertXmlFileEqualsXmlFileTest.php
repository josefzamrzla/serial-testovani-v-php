<?php
class AssertXmlFileEqualsXmlFileTest extends PHPUnit_Framework_TestCase
{
    public function testAssertXmlFileEqualsXmlFile()
    {
        $this->assertXmlFileEqualsXmlFile(__DIR__."/file1.xml", __DIR__."/file2.xml");
    }
}