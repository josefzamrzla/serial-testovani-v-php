<?php
class AssertXmlStringEqualsXmlFileTest extends PHPUnit_Framework_TestCase
{
    public function testAssertXmlStringEqualsXmlFile()
    {
        $actual = "<foo>
            <bar>
                <baz id=\"bazId\">something</baz>
            </bar>
            <bar>
                <baz id=\"bazOtherId\">something other</baz>
            </bar>
        </foo>";

        $this->assertXmlStringEqualsXmlFile(__DIR__."/file.xml", $actual);
    }
}