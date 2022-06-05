<?php
namespace classes\controller;

class ProductCtrl extends \classes\model\Product
{
    public function getProducts()
    {
        $getProducts = $this->getProductsSql();
        return $getProducts;
    }

    public function addNewProduct($productData)
    {
        $attribute = new \classes\ProductAttributes();
        $attribute->setAttribute($productData);

        $size = $attribute->getAttribute('size');
        $weight = $attribute->getAttribute('weight');
        $dimentions = $attribute->getAttribute('dimentions');
        $sku = $attribute->getAttribute('sku');
        $name = $attribute->getAttribute('name');
        $price = $attribute->getAttribute('price');
        $type = $attribute->getAttribute('type');

        //check if the sku is already present in the database
        if ($this->checkDuplicateSkuSql($sku)) {
            return;
        }

        $this->addProductSql($size, $weight, $dimentions, $sku, $name, $price, $type);
    }

    public function deleteProduct($productInput)
    {
        $this->deleteProductSql($productInput);
    }
}