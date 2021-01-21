<?php

require "Item.php";
require "AbstractsClasses.php";
require "BasketItem.php";
require "OrderItem.php";
require "DigitalProduct.php";
require "PieceProduct.php";
require "WeightProduct.php";



// вызов класса и передаваемые параметры
//массив  с вызовом класса и передаваемыми данными бренда и цены
/*
$items = [
    new Item(1, "mrGrinch", "t-short", "man",  1000),
   new BasketItem(2, "Santa", "jeans","women",  1000, 2),
    new OrderItem(2, "Black", "dress","women",  1000, 2, 1),
];
//обходим массив с данными
foreach ($items as $item) {
    $item->about();
}
*/


//вызов метода наследников абстрактного класса

$arr = [
    new DigitalProduct('alias', 200),
    new DigitalProduct('hokku', 400),
    new PieceProduct('apple', 3, 10),
    new WeightProduct('banana', 0.200, 200),
    new WeightProduct('rice', 1, 40)
];


foreach ($arr as $items) {
    $items->setPrice();
}



/*
 * Задания 1-4.
 * Создано три класса Item, BasketItem, OrderItem.
 *  в котором описывается товар.
 * Item - является родительским классом, в свойствах которого заданы
 *  id товара, бренд, категория, тип, цена.
 * BasketItem расширяет родительский класс Item и добавляет свойство count
 *
 * OrderItem является подклассом BasketItem и добавляет свойство orderId.
 *
 * Методом для вывода данных является функция about.
 * в каждом классе присутствует функция about, которая расширяется в подклассах
 *  about расширяется.
 *
  Задание 5.

    Дан код:

   class A {
        public function foo() {
            static $x = 0;
            echo ++$x;
        }
    }
    $a1 = new A();
    $a2 = new A();
    $a1->foo(); //1
    $a2->foo(); //2
    $a1->foo(); //3
    $a2->foo(); //4

  Что он выведет на каждом шаге? Почему?

результатом работы класса будет вывод значений 1234.
Происходит это из-за того что $x - является статическими, а а1 и а2 вызывают один класс,
 поэтому результат его работы будет каждый раз сохраняться вне зависимости
от переменной вызывающей функцию. Если убрать static перед $x, то результатом работы функции будет 1111.

    Задание 6. Немного изменим п.5:
        class A {
            public function foo() {
                static $x = 0;
                echo ++$x;
            }
        }
        class B extends A {
        }
        $a1 = new A();
        $b1 = new B();
        $a1->foo(); //1
        $b1->foo(); //1
        $a1->foo(); //2
        $b1->foo(); //2

     Объясните результаты в этом случае.

    Класс В является наследником класса А, поэтому класс В использует структуру класса А.
    Так как класс В использует такую же структуру как и класс А, то в обоих случаях $x
    является статическим и сохраняется после вызова функции, но так как функция
    вызывается для разных классов то и $x для них будет разным.
    поэтому результат будет а1 = 1, b1 = 1, a1 = 2, b1 = 2.


    Задание 7. *Дан код.

    class A {
        public function foo() {
            static $x = 0;
            echo ++$x;
        }
    }
    class B extends A {
    }
    $a1 = new A;
    $b1 = new B;
    $a1->foo(); //1
    $b1->foo(); //1
    $a1->foo(); //2
    $b1->foo(); //2

    результат работы идентичен пункту 6, также как и сам код.



 */
