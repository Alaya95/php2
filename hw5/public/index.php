<?php
session_start();


error_reporting(E_ALL & ~E_NOTICE);

require '../vendor/autoload.php';

\MyApp\App::getInstanse()
    ->setConfig(require "../config/main.php")
    ->run();