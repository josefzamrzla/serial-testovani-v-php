<?php
require_once __DIR__ . "/../DatabaseTestCase.php";

class DatabaseDatasetTest extends DatabaseTestCase
{
    public function testDatabaseDataset()
    {
        $expectedDataSet = $this->createFlatXMLDataSet(__DIR__ . "/databaseDataset.xml");
        $dbDataSet = $this->getConnection()->createDataSet();

        $this->assertDataSetsEqual($expectedDataSet, $dbDataSet);
    }

    public function testFilteredDatabaseDataset()
    {
        $expectedDataSet = $this->createFlatXMLDataSet(__DIR__ . "/databaseDataset.xml");
        $dbDataSet = $this->getConnection()->createDataSet(array("product"));

        $this->assertDataSetsEqual($expectedDataSet, $dbDataSet);
    }
}