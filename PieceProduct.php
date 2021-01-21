<?php

/*
 * Штучный товар
 * Цена зависит от количества штук
 */

class PieceProduct extends AbstractsClasses
{
    private $name; //имя товара
    private $count;
    private $priceOfOneProduct; //цена одного товара

    public function __construct($name, $count, $priceOfOneProduct)
    {
        $this->name = $name;
        $this->count = $count;
        $this->priceOfOneProduct = $priceOfOneProduct;
    }

    /*
     * Метод подсчета финальной стоимости
     * подсчет стоимости зависит от количества штук
     */

    public function setPrice()
    {

        echo $this->name . ' ' . ($this->count * $this->priceOfOneProduct). '<br>';
        // TODO: Implement setPrice() method.
    }
}