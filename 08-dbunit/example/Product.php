<?php
class Product
{
    private $id = null;

    public $name;
    public $price;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}