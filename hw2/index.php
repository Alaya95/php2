<?php

require "../interfaces/ProductsInterface.php";
require "Products.php";
require "DigitalProduct.php";
require "PieceProduct.php";
require "WeightProduct.php";

//абстрактный класс.

$piecePrice = 100;

$products = [
    new PieceProduct('Молоток', $piecePrice, 10),
    new DigitalProduct('Лицензия', 500),
    new WeightProduct('Картофель', $piecePrice, 0.2),
];

foreach ($products as $product) {
    echo "<br>" . $product->getName() . ' price ' . $product->getFinalPrice();
}
