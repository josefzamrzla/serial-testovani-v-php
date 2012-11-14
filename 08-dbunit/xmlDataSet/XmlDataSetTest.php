<?php
class XmlDataSetTest extends PHPUnit_Extensions_Database_TestCase
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
        return $this->createXMLDataSet(__DIR__ . "/xmlDataSet.xml");
    }

    public function testFoo()
    {
        // just import data set, do not test anything
        $this->assertTrue(true);
    }
}