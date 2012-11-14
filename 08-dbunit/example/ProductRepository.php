<?php
require_once "Product.php";

class ProductRepository
{
    /**
     * @var PDO
     */
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stm = $this->db->prepare("
            SELECT * FROM product WHERE id = :id");

        if ($stm->execute(array(":id" => $id))) {
            $data = $stm->fetch();
            $product = new Product($data['id']);
            $product->name = $data['name'];
            $product->price = $data['price'];

            return $product;
        }

        return false;
    }

    public function save(Product $product)
    {
        $data = array(":name" => $product->name, ":price" => $product->price);

        if ($product->getId() === null) {

            $stm = $this->db->prepare("
                INSERT INTO product(name, price) VALUES (:name, :price)");

            if ($stm->execute($data)) {
                return $this->db->lastInsertId();
            }

        } else {
            $stm = $this->db->prepare("
                UPDATE product SET name = :name, price = :price
                WHERE id = :id");

            $data[':id'] = $product->getId();
            if ($stm->execute($data)) {
                return $product->getId();
            }
        }

        return false;
    }
}