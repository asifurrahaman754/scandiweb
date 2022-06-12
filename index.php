<?php

//autoload classes
require "includes/autoload.inc.php";

$route = new \classes\Router();

$route->get("/", function () {
    require_once __DIR__."/pages/Home.php";
});

$route->get("/add-product", function () {
    require_once __DIR__."/pages/add-product.php";
});

$route->execute();