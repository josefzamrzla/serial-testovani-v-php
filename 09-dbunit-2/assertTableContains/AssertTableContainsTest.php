<?php
require_once __DIR__ . "/../DatabaseTestCase.php";

class AssertTableContainsTest extends DatabaseTestCase
{
    public function testAssertTableContains()
    {
        $expected = array("id" => "1", "name" => "Test product 1", "price" => "123");
        $this->assertTableContains($expected, $this->getConnection()->createDataSet()->getTable("product"));
    }
}