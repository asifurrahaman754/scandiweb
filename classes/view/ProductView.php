<?php
namespace classes\view;

class ProductView extends \classes\controller\ProductCtrl
{
    //get all the products from the database
    public function showAllProducts()
    {
        $getAllProducts = $this->getProducts();
        $viewProducts = include "includes/components/AllProductMarkup.inc.php";
        return $viewProducts;
    }
}