<?php
class AssertSelectEqualsTest extends PHPUnit_Framework_TestCase
{
    public function testAssertSelectEquals()
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

        $this->assertSelectEquals("fooBar baz[ids=3]", "3", 1, $xml);
        $this->assertSelectEquals("fooBar baz[ids=2]", "3", false, $xml);
    }
}