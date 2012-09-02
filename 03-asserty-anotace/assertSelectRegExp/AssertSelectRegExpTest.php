<?php
class AssertSelectRegExpTest extends PHPUnit_Framework_TestCase
{
    public function testAssertSelectRegExp()
    {
        $xml = "
            <foo>
                <fooBar>
                    <baz ids='1'>1</baz>
                    <baz ids='2'>2</baz>
                    <baz ids='3'>3</baz>
                </fooBar>
                <fooBar>
                    <baz ids='4'>4</baz>
                    <baz ids='5'>5</baz>
                </fooBar>
            </foo>";

        $this->assertSelectRegExp("fooBar baz[ids=3]", "|[0-9]+|", 1, $xml);
    }
}