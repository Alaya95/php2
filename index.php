<?php

require "vendor/autoload.php";

include "dbConnect.php";

$pathToImg = "src/img/";

$result = mysqli_query($db, "SELECT * FROM image_data;");

$imgArr = [];

while ($row = mysqli_fetch_assoc($result)) {
    $imgArr[] = [
       "name" => $pathToImg . $row['name'],
        "altername" => $row['altername'],
    ];
}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('index.twig', [
    "images" => $imgArr,
]);