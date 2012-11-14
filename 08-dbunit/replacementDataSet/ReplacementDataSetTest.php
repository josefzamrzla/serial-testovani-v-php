<?php
class ReplacementDataSetTest extends PHPUnit_Extensions_Database_TestCase
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
        $dataSet = $this->createFlatXmlDataSet(__DIR__ . "/dataset.xml");
        $replacement = new PHPUnit_Extensions_Database_DataSet_ReplacementDataSet($dataSet);
        $replacement->addFullReplacement("###NULL###", null);
        return $replacement;
    }

    public function testFoo()
    {
        // just import data set, do not test anything
        $this->assertTrue(true);
    }
}