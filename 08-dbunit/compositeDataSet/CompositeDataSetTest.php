<?php
class CompositeDataSetTest extends PHPUnit_Extensions_Database_TestCase
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
        $ds1 = $this->createFlatXmlDataSet(__DIR__ . "/flatXmlDataSet.xml");
        $ds2 = new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
            __DIR__ . "/yamlDataSet.yml");

        $compositeDs = new PHPUnit_Extensions_Database_DataSet_CompositeDataSet(array());
        $compositeDs->addDataSet($ds1);
        $compositeDs->addDataSet($ds2);

        return $compositeDs;
    }

    public function testFoo()
    {
        // just import data set, do not test anything
        $this->assertTrue(true);
    }
}