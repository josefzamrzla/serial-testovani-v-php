<?php
require_once "Product.php";
require_once "ProductConversion.php";
require_once "ProductImport.php";
require_once "ProductParser.php";
require_once "ProductRepository.php";

class ProductImportTest extends PHPUnit_Framework_TestCase
{
    public function testInsertNewProduct()
    {
        $futureNewProductId = 111;
        $foreignProductCode = "PROD01";
        $productName = "Test product";

        $product = new Product();
        $product->setName($productName);

        $repository = $this->getMock("ProductRepository");
        $repository->expects($this->once())
            ->method("insert")
            ->with($product)
            ->will($this->returnValue($futureNewProductId));

        $repository->expects($this->never())->method("update");

        $conversion = $this->getMock("ProductConversion");
        $conversion->expects($this->once())
            ->method("exists")
            ->with($foreignProductCode)
            ->will($this->returnValue(false));

        $conversion->expects($this->once())
            ->method("insert")
            ->with($foreignProductCode, $futureNewProductId);

        $parser = $this->getMock("ProductParser");
        $parser->expects($this->exactly(2))
            ->method("getCode")
            ->will($this->returnValue($foreignProductCode));

        $parser->expects($this->once())
            ->method("getName")
            ->will($this->returnValue($productName));


        $import = new ProductImport($repository, $conversion);

        $this->assertEquals($futureNewProductId, $import->import($parser));
    }

    public function testUpdateProduct()
    {
        $existentProductId = 222;
        $foreignProductCode = "PROD02";
        $productName = "Test product 2";

        $product = new Product();
        $product->setName($productName);

        $repository = $this->getMock("ProductRepository");
        $repository->expects($this->once())
            ->method("update")
            ->with($existentProductId, $product)
            ->will($this->returnValue($existentProductId));

        $repository->expects($this->never())->method("insert");

        $conversion = $this->getMock("ProductConversion");
        $conversion->expects($this->once())
            ->method("exists")
            ->with($foreignProductCode)
            ->will($this->returnValue($existentProductId));

        $conversion->expects($this->never())->method("insert");

        $parser = $this->getMock("ProductParser");
        $parser->expects($this->once())
            ->method("getCode")
            ->will($this->returnValue($foreignProductCode));

        $parser->expects($this->once())
            ->method("getName")
            ->will($this->returnValue($productName));


        $import = new ProductImport($repository, $conversion);

        $this->assertEquals($existentProductId, $import->import($parser));
    }

}