<?php

class Item
{
    // объявление свойств класса
    private $itemId;
    private $brand;
    private $productType;
    private $category;
    private $price;

    //конструктор
    public function __construct($itemId, $brand, $productType, $category, $price)
    {
        $this->itemId = $itemId;
        $this->brand = $brand;
        $this->productType = $productType;
        $this->category = $category;
        $this->price = $price;
    }

    //объявление методов класса
    // функция выводящая сообщение
    public function about()
    {
        echo '<br>' . $this->itemId . ' ' . $this->brand . " " . $this->productType . ' category: ' . $this->category . ' price: ' . $this->price;
    }
}
