<?php
require "DBConnect.php";
require "../vendor/autoload.php";

$items = DBConnect::getInstance()->getAllData(DBConnect::TABLE_GOODS);

if(isset($_GET['showMore'])){
    $showMore = DBConnect::getInstance()->getShowMore(DBConnect::TABLE_GOODS);
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('index.twig', [
    "items" => $items,
    'itemsShow' => $showMore,
]);

