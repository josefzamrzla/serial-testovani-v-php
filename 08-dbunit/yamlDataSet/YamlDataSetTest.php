<?php
class YamlDataSetTest extends PHPUnit_Extensions_Database_TestCase
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
        return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(__DIR__ . "/yamlDataSet.yml");
    }

    public function testFoo()
    {
        // just import data set, do not test anything
        $this->assertTrue(true);
    }
}