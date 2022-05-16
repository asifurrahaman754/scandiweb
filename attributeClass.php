<?php

class Attributes
{
    private $sku;
    private $name;
    private $price;
    private $type;
    private $size;
    private $weight;
    private $height;
    private $width;
    private $length;
    private $dimentions;

    public function setAttribute($productData)
    {
        $this->sku = $productData->sku ?? '';
        $this->name = $productData->name ?? '';
        $this->price = $productData->price ?? '';
        $this->type = $productData->productType ?? '';
        $this->size = $productData->size ?? '';
        $this->weight = $productData->weight ?? '';
        $this->height = $productData->height ?? '';
        $this->width = $productData->width ?? '';
        $this->length = $productData->length ?? '';
        $this->dimentions = ($productData->height) ? $productData->height . "x" . $productData->width . "x" . $productData->length : "0";
    }

    public function getAttribute($item)
    {
        return $this->$item;
    }
}