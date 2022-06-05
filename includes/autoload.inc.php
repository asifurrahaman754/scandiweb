<?php

spl_autoload_register(function ($class) {
    $str = str_replace("\\", "/", $class);
    $file = __DIR__ . '///..///' . $str . ".php";
    
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});