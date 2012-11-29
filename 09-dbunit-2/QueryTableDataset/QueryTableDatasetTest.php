<?php
require_once __DIR__ . "/../DatabaseTestCase.php";

class QueryTableDatasetTest extends DatabaseTestCase
{
    public function testQueryTableDataset()
    {
        $queryTableDataset = $this->getConnection()->createQueryTable(
            "product", "SELECT * FROM product WHERE id > 1");

        $expectedDataSet = $this->createFlatXMLDataSet(__DIR__ . "/queryResultDataset.xml")->getTable("product");

        $this->assertTablesEqual($expectedDataSet, $queryTableDataset);
    }
}