<?php


class OrderItem extends BasketItem
{
    private $orderId;

    public function __construct($itemId, $brand, $productType, $category, $price, $count, $orderId)
    {
        $this->orderId = $orderId;
        parent::__construct($itemId, $brand, $productType, $category, $price, $count);
    }

    public function about()
    {

        parent::about();
        echo " orderID: " . $this->orderId;
    }

}