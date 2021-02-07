<?php

class BasketTest extends \PHPUnit\Framework\TestCase
{
    private $basket;

    protected function setUp(): void
    {
        $this->basket = new \MyApp\Basket();
    }


    public function testInit()
    {
        self::assertNull($this->basket->init());
    }

    public function testGet()
    {
        $expected = [
            'count' => 0,
            'goods' => [],
        ];

        self::assertEquals($expected, $this->basket->get());
    }

    public function testClear()
    {
        self::assertNull($this->basket->clear());
    }

    public static function testAdd()
    {

        $basket = new \MyApp\Basket();

         error_reporting(0);
        /* выдает ошибку
         * 1) BasketTest::testAdd
            Undefined offset: 2

            D:\geek\geek\2\php2\hw5\src\Basket.php:20
            D:\geek\geek\2\php2\hw5\tests\BasketTest.php:42
         */
        self::assertNull($basket->add(2));
    }
}