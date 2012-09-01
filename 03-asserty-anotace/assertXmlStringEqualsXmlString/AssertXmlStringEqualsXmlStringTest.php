<?php
class AssertXmlStringEqualsXmlStringTest extends PHPUnit_Framework_TestCase
{
    public function testAssertXmlStringEqualsXmlString()
    {
        $actual = "<foo>
            <bar>
                <baz id=\"bazId\">something</baz>
            </bar>
            <bar>
                <baz id=\"bazOtherId\">something other</baz>
            </bar>
        </foo>";

        $expected = "<foo><bar><baz id=\"bazId\">something</baz></bar><bar><baz id=\"bazOtherId\">something other</baz></bar></foo>";

        $this->assertXmlStringEqualsXmlString($expected, $actual);
    }
}