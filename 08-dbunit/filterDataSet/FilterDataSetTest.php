<?php
class FilterDataSetTest extends PHPUnit_Extensions_Database_TestCase
{
    protected function getPdo()
    {
        return new PDO("mysql:host=localhost;dbname=test", "test", "test");
    }

    protected function getConnection()
    {
        return $this->createDefaultDBConnection($this->getPdo());
    }

    protected function getDataSet()
    {
        $ds = $this->createFlatXmlDataSet(__DIR__ . "/flatDataSet.xml");

        $filterDataSet = new PHPUnit_Extensions_Database_DataSet_DataSetFilter($ds);
        $filterDataSet->addIncludeTables(array("product"));
        $filterDataSet->setExcludeColumnsForTable("product", array("bar"));

        return $filterDataSet;
    }

    public function testFoo()
    {
        // just import data set, do not test anything
        $this->assertTrue(true);
    }
}