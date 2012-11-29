<?php
abstract class DatabaseTestCase extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * @var PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    protected $connection = null;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    protected function getConnection()
    {
        if ($this->connection === null) {
            $this->connection = $this->createDefaultDBConnection(
                new PDO('mysql:host=localhost;dbname=test', 'test', 'test')
            );
        }

        return $this->connection;
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataset()
    {
        return $this->createFlatXMLDataSet(__DIR__ . "/dataset.xml");
    }

    protected function tearDown()
    {
        $this->connection->close();
        parent::tearDown();
    }
}