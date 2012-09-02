<?php
class AssertSelectCountTest extends PHPUnit_Framework_TestCase
{
    public function testAssertSelectCount()
    {
        $html = "
            <html>
                <head />
                <body>
                    <div id='main'>
                        <div>xxx</div>
                        <div>
                            <p>fsfsdfsd</p>
                            <p class='par'><span class='line'>fsfsdfsd</span></p>
                        </div>
                    </div>
                </body>
            </html>
        ";

        $this->assertSelectCount("div#main", 1, $html);
        $this->assertSelectCount("div#main div p", 2, $html);
        $this->assertSelectCount("div#main div p.par", 1, $html);

        $this->assertSelectCount("h1", false, $html);
        $this->assertSelectCount("span.line", true, $html);
    }

    public function testAssertSelectCountXmlMode()
    {
        $xml = "
            <foo>
                <fooBar name='first'>
                    <bar>1</bar>
                    <bar>
                        2
                        <bar attr='lorem ipsum dolor'>sub2</bar>
                    </bar>
                    <bar>3</bar>
                </fooBar>
                <fooBar name='second'>
                    <bar>4</bar>
                    <bar>5</bar>
                </fooBar>
            </foo>
        ";

        $this->assertSelectCount('*[name="first"]', true, $xml, "Xml matches selector", false);
        $this->assertSelectCount('fooBar[name="first"]', 1, $xml, "Xml matches selector", false);
        $this->assertSelectCount('bar[attr~="ipsum"]', 1, $xml, "Xml matches selector", false);
        $this->assertSelectCount('bar[attr*="ipsum dolor"]', 1, $xml, "Xml matches selector", false);
        $this->assertSelectCount("fooBar > bar", array(">=" => 1, "<" => 6), $xml, "Xml matches selector", false);

        // fails - total count of any bar elements = 6 !
        // $this->assertSelectCount("fooBar bar", array(">=" => 1, "<" => 6), $xml, "Xml matches selector", false);
    }
}