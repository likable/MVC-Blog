<?php

namespace application\core;

class View 
{
    public $path;
    public $route;
    public $layout = 'default';
    
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }
    
    public function render($title, $vars = [])
    {
        extract($vars);
        $content_path = 'application/views/' . $this->path . '.php';
        if (file_exists($content_path)) {
            ob_start();
            require $content_path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        } 
    }

    public function redirect($url) 
    {
        header('Location: ' . $url);
    }
    
    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }
    
    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }
    
    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }
    
}
