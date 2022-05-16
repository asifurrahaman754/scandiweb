<?php

//fix cors problem
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");

include "connectClass.php";
include "validationClass.php";
include "attributeClass.php";
include "productClass.php";

//get the data from the POST request as a json array
$userInput = json_decode(file_get_contents("php://input"));

$method = $_SERVER['REQUEST_METHOD'];
$products = new Products();

switch ($method) {
    case 'GET':
        $products->getProducts();
        break;
    case 'POST':
        $products->addProduct($userInput);
        break;
    case 'DELETE':
        $products->deleteProduct($userInput);
        break;
}