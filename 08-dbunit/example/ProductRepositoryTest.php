<?php
require_once "ProductRepository.php";

class ProductRepositoryTest extends PHPUnit_Extensions_Database_TestCase
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
        return $this->createFlatXMLDataSet(__DIR__ . "/productsDataSet.xml");
    }

    public function testInitialData()
    {
        $repository = new ProductRepository($this->getPdo());

        $this->assertEquals("Test product 1",
            $repository->getById(1)->name);
        $this->assertEquals(456, $repository->getById(2)->price);
    }

    public function testInsert()
    {
        $product = new Product();
        $product->name = "Brand new product";
        $product->price = 111;

        $repository = new ProductRepository($this->getPdo());
        $id = $repository->save($product);

        $this->assertEquals(3, $id);
        $this->assertEquals("Brand new product", $repository->getById(3)->name);
        $this->assertEquals(111, $repository->getById(3)->price);
    }

    public function testUpdate()
    {
        $repository = new ProductRepository($this->getPdo());
        $product = $repository->getById(1);

        $this->assertEquals("Test product 1", $product->name);
        $this->assertEquals(123, $product->price);

        $product->name = "Updated name";
        $product->price = 0;

        $repository->save($product);

        $this->assertEquals("Updated name", $repository->getById(1)->name);
        $this->assertEquals(0, $repository->getById(1)->price);
    }
}