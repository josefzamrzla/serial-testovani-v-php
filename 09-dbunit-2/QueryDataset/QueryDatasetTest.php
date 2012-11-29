<?php
require_once __DIR__ . "/../DatabaseTestCase.php";

class QueryDatasetTest extends DatabaseTestCase
{
    public function testQueryDataset()
    {
        $queryDataset = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());
        $queryDataset->addTable("product", "SELECT * FROM product WHERE id > 1");
        // ... more SQL queries ...

        $expectedDataSet = $this->createFlatXMLDataSet(__DIR__ . "/queryResultDataset.xml");

        $this->assertDataSetsEqual($expectedDataSet, $queryDataset);
    }
}