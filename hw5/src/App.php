<?php

namespace MyApp;

use MyApp\Controllers\IndexController;

class App
{
    private static $instanse;
    private $config;
    private $db;

    public static function getInstanse()
    {
        if (null === self::$instanse) {
            self::$instanse = new self();
        }
        return self::$instanse;
    }

    public function getDB(): DB
    {
        return $this->db;
    }

    public function run()
    {
        $this->db = new DB($this->config['db']);

        $path = $_SERVER['REQUEST_URI'];
        [$url] = explode('?', $path);
        $url = trim($url, '/');
        [$controllerName, $actionName, $param] = explode('/', $url);

        if (empty($controllerName)) {
            $controllerName = 'index';
        }

        if (empty($actionName)) {
            $actionName = 'index';
        }

        $controllerClass = "MyApp\Controllers\\" . ucfirst($controllerName) . "Controller";
        $methodName = 'action' . ucfirst($actionName);

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $methodName)) {
                $controller->$methodName($param);
                return;
            }
        }

        (new IndexController())->actionErrror();


        /* print_r([
             'controller' => $controllerName,
             'action' => $actionName,
             'param' => $param
         ]);*/

    }


    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    private function __construct()
    {

    }
}