<?php

namespace MyApp\Controllers;


class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->render("index.twig");
    }

    public function actionErrror()
    {
        $this->render("error.twig");
    }
}