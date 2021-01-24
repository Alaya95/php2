<?php

/*
 * Абстрактный класс, который содержит метод подсчета финальной стоимости (setPrice)
 *
 * т.к. методы несут лишь описательный характер, то их реализация не описывается.
 *
 * По причине того что наследник обязан реализовать все методы, как абстрактные, то этим методом будет метод подсчета финальной стоимости. (setPrice)
 */

abstract class Products implements ProductsInterface
{
    private $name;
    protected $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract function getFinalPrice(): float;
}




