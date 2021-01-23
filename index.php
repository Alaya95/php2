<?php

require "Item.php";
require "BasketItem.php";
require "OrderItem.php";
require "interfaces/ProductsInterface.php";
require "Products.php";
require "DigitalProduct.php";
require "PieceProduct.php";
require "WeightProduct.php";

// вызов класса и передаваемые параметры
//массив  с вызовом класса и передаваемыми данными бренда и цены

$items = [
    new Item(1, "mrGrinch", "t-short", "man", 1000),
    new BasketItem(2, "Santa", "jeans", "women", 1000, 2),
    new OrderItem(2, "Black", "dress", "women", 1000, 2, 1),
];
//обходим массив с данными
foreach ($items as $item) {
    $item->about();
}

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