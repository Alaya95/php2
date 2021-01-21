<?php

/*
 * цифровой товар
 * стоимость постоянная
 *
 */
class DigitalProduct extends AbstractsClasses
{
    //определение свойств класса
    private $name;
    private $price;

    //конструктор

    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    //метод подсчета финальной стоимости (setPrice)
    //реализация абстрактного метода должна быть protected или public
    public function setPrice()
    {
        echo  $this->name . ' ' . $this->price  . '<br>';
    }

}


