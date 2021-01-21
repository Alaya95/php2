<?php
/*
 * Весовой товар
 */

class WeightProduct extends AbstractsClasses
{
    private $name;
    private $weight;
    private $price;

    public function __construct($name, $weight, $price)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;

    }

    //Метод подсчета финальной стоимости
    public function setPrice()
    {
        echo 'weigt product: ' . $this->name . ' ' . ($this->price * $this->weight) . "<br>";

        // TODO: Implement setPrice() method.
    }
}