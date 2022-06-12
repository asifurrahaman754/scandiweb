<?php
namespace classes;

class ProductTypes
{
    private $DVD;
    private $Furniture;
    private $Book;

    public function __construct()
    {
        $this->DVD = [
            "field" => "size",
            "append" => "MB"
        ];
        $this->Furniture = [
            "field" => "dimentions",
            "append" => ""
        ];
        $this->Book = [
            "field" => "weight",
            "append" => "Kg"
        ];
    }

    public function getProductType($type)
    {
        return $this->$type;
    }
}