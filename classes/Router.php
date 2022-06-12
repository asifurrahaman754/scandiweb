<?php

namespace classes;

class Router
{
    private $handlers = [];
 
    public function get($path, $callback)
    {
        $this->handlers[$path] = [
            'path' => $path,
            'method' => 'GET',
            'callback' => $callback
        ];
    }

    public function execute()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
        $notFound = true;
        //check if the current URI is in the array of handlers
        foreach ($this->handlers as $handler) {
            if ($handler['path'] === $uri) {
                $notFound = false;
                $handler['callback']();
                return;
            }
        }

        //if the current URI is not in the array of handlers, show 404
        if ($notFound) {
            echo "404! Not Found";
        }
    }
}