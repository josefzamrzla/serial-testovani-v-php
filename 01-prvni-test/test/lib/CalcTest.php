<?php
require_once __DIR__."/../../src/lib/Calc.php";

class CalcTest extends PHPUnit_Framework_TestCase {

    private $calc;

    protected function setUp()
    {
        $this->calc = new Calc();
    }

    public function testMultiply()
    {
        $this->assertEquals(10, $this->calc->multiply(2, 5), "Chyba nasobeni: 2 x 5 != 10");
    }

    public function testDivide()
    {
        $this->assertEquals(2, $this->calc->divide(10, 5), "Chyba deleni: 10 / 5 != 2");
    }

}