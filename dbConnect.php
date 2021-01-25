<?php

$db = mysqli_connect('localhost', 'root', 'root', 'images', '3307');

if (!$db) {
    echo "ошибка подключения";
    echo "Номер ошибки" . mysqli_connect_errno() . "<br>";
    echo "Ошибка" . mysqli_connect_error();
    exit();
}