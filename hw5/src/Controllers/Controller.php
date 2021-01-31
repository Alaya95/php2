<?php

namespace MyApp\Controllers;

use MyApp\App;

class Controller
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(App::getInstanse()->getConfig()['templates']);
        $this->twig = new \Twig\Environment($loader);
    }

    protected function redirect($url = null)
    {
        if( null === $url){
            $url = $_SERVER['REQUEST_URI'];
        }
        header('Location: ' . $url);
        exit;
    }

    protected function render($templates, $data = [])
    {
        echo $this->twig->render($templates, $data);
    }
}