<?php
require_once "Calc.php";

class CalcTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestAddData
     */
    public function testAdd($expectedResult, $x, $y)
    {
        $calc = new Calc();
        $this->assertEquals($expectedResult, $calc->add($x, $y));
    }

    public function getTestAddData()
    {
        return array(
            array(3, 1, 2),
            array(10, 5, 5),
            array(0, 5, -5)
        );
    }
}