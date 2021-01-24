<?php

/*
 * цифровой товар
 * стоимость постоянная
 */

class DigitalProduct extends Products
{
    public function getFinalPrice(): float
    {
        return $this->price;
    }
}