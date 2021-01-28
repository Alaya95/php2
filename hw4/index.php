<?php
require "DBConnect.php";
require "../vendor/autoload.php";


$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$items = $showMore = null;

if(isset($_GET['showMore'])){
    print_r($_GET);
    $showMore = DBConnect::getInstance()->getShowMore(DBConnect::TABLE_GOODS);
    echo $twig->render('goods.twig', [
        "items" => $items,
        "showMore" => $showMore,
    ]);
} else {
    $items = DBConnect::getInstance()->getAllData(DBConnect::TABLE_GOODS);
      echo $twig->render('index.twig', [
          "items" => $items,
      ]);
}

