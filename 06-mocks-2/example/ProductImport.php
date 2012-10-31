<?php
class ProductImport
{
    /**
     * @var ProductConversion
     */
    private $conversion;

    /**
     * @var ProductRepository
     */
    private $repository;

    public function __construct(ProductRepository $repository, ProductConversion $conversion)
    {
        $this->repository = $repository;
        $this->conversion = $conversion;
    }

    public function import(ProductParser $parser)
    {
        $product = new Product();
        $product->setName($parser->getName());

        $productId = $this->conversion->exists($parser->getCode());
        if ($productId) {
            // update existent product
            $this->repository->update($productId, $product);
            return $productId;
        } else {
            // create new product
            $productId = $this->repository->insert($product);
            $this->conversion->insert($parser->getCode(), $productId);
            return $productId;
        }
    }
}