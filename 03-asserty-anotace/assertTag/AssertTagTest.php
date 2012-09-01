<?php
class AssertTagTest extends PHPUnit_Framework_TestCase
{
    public function testAssertTagHtmlMode()
    {
        $html = "
            <html>
                <head>
                    <title>foo</title>
                </head>
                <body>
                    <div id='main'>
                        <p>first paragraph</p>
                        <p>second paragraph</p>
                    </div>
                </body>
            </html>";

        $matcher = array("id" => "main");
        $this->assertTag($matcher, $html);

        $matcher = array(
            "id" => "main",
            "tag" => "div",
            "children" => array(
                "count" => 2,
                "only" => array(
                    "tag" => "p"
                )
            )
        );

        $this->assertTag($matcher, $html);
    }

    public function testAssertTagXmlMode()
    {
        $html = "
            <foo>
                <fooBar id='fb1'>
                    <baz>1</baz>
                    <baz>2</baz>
                    <baz>3</baz>
                </fooBar>
                <fooBar id='fb2'>
                    <baz>4</baz>
                    <baz>5</baz>
                </fooBar>
            </foo>";

        $matcher = array(
            "id" => "fb1",
            "tag" => "fooBar",
            "child" => array(
                "tag" => "baz"
            )
        );


        $this->assertTag($matcher, $html, "Assert element matches matcher", false);
    }
}