<?php


class BasketItem extends Item
{
    protected $count;

    public function __construct($itemId, $brand, $productType, $category, $price, $count)
    {
        $this->count = $count;
        parent::__construct($itemId, $brand, $productType, $category, $price);

    }

    public function about()
    {
        parent::about();
        echo ' count: ' . $this->count;
    }
}