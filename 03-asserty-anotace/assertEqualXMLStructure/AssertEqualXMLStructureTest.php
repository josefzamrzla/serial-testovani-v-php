<?php
class AssertEqualXMLStructureTest extends PHPUnit_Framework_TestCase
{
    public function testAssertEqualXMLStructure()
    {
        $expected = new DOMDocument();
        $expected->loadXML("<foo><bar>baz</bar></foo>");

        $actual = new DOMDocument();
        $actual->loadXML("<foo><bar id='barId'>baz</bar></foo>");

        $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);

        // fails - actual XML structure contents element "bar" with attribute "id"
        // $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild, true);
    }
}