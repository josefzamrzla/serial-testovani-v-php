<?php
require_once __DIR__ . "/../DatabaseTestCase.php";

class AssertTableRowCountTest extends DatabaseDatasetTest
{
    public function testAssertTableRowCount()
    {
        $this->assertTableRowCount("product", 3);
    }
}