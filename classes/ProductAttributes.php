<?php
namespace classes;

class ProductAttributes
{
    private $sku;
    private $name;
    private $price;
    private $type;
    private $size;
    private $weight;
    private $dimentions;

    public function setAttribute($productData)
    {
        $this->sku = $productData["sku"] ?? '';
        $this->name = $productData["name"] ?? '';
        $this->price = $productData["price"] ?? '';
        $this->type = $productData["productType"] ?? '';
        $this->size = $productData["size"] ?? '';
        $this->weight = $productData["weight"] ?? '';
        $this->dimentions = ($productData["height"]) ? $productData["height"] . "x" . $productData["width"] . "x" . $productData["length"] : "0";
    }

    public function getAttribute($item)
    {
        return $this->$item;
    }
}