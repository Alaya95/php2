<?php

namespace MyApp\Controllers;

use MyApp\Auth;
use MyApp\Basket;
use MyApp\Models\Goods;
use MyApp\Models\History;
use MyApp\Models\Orders;
use MyApp\Models\Users;

class AccountController extends Controller
{
    public function actionOrder()
    {
        $basket = Basket::get();

        if (!$basket['count']) {
            $this->redirect('/catalog');
        }

        if (!($user = Auth::getUser())) {
            $this->redirect('login');
        }

        $orderId = Orders::add($user['id'], $basket['goods']);

        Basket::clear();

        $this->render('account/order.twig', [
            'orderId' => $orderId,
        ]);
    }

    public function actionOrders()
    {
        /*
         * Здесь должен выводиться список всех заказов
         * для админа или root
         */
        if ($_SESSION['login']) {
            $this->redirect('login');
        }
        /*
         * Получаем массив ролей пользователя
         */
        $userRoles = $_SESSION['roles'];

        foreach ($userRoles as $key) {
            $userRole[] = $key['role'];
        }

        /*
         * Не получилось ничего придумать кроме как это
         * Если пользователь не является админом или рутом
         * его перенаправит обратно в аккаунт
         */
        if($userRole[0] == 1 || $userRole[1] == 2) {
            $orders = Orders::getOrders();

            $this->render('account/orders.twig', [
                'orders' => $orders,
            ]);
        } else {
            $this->redirect('/account');
        }
    }

    public function actionBasket()
    {
        $basket = Basket::get();

        $goods = [];
        $sum = 0;

        foreach ($basket['goods'] as $id => $count) {
            $good = Goods::getById($id);
            $good['count'] = $count;
            $sum += $good['sum'] = $count * $good['price'];
            $goods[] = $good;
        }

        $this->render('account/basket.twig', [
            'sum' => $sum,
            'goods' => $goods,
        ]);
    }

    public function actionLogin()
    {
        $error = false;

        if (isset($_POST['login'])) {
            if (Users::check($_POST['login'], $_POST['pwd'])) {
                Auth::login($_POST['login']);
                Auth::usersRoles($_SESSION['user']['id']);
                $this->redirect('/account');
            } else {
                $error = true;
            }
        }
        $this->render('account/login.twig', [
            'error' => $error,
        ]);
    }

    public function actionLogout()
    {
        Auth::logout();
        Basket::clear();
        $this->redirect('/');
    }

    public function actionIndex()
    {

        if (!($user = Auth::getUser())) {
            $this->redirect('/login');
        }

        $history = History::getLast($user['id']);

        /*
         * Тут универсальный запрос получился...
         * выводит все заказанные товары, которые соответствуют
         * orders.user_id = id пользователя которые зашел в систему
         */

        $error = false;


        if ($orders = Orders::get($user['id'])) {
            $error = true;
        }

        $this->render('account/index.twig', [
            'history' => $history,
            'orders' => $orders,
            'errorOrder' => $error,
        ]);
    }


    public function actionSettings()
    {
        echo 'Users settings';
    }

    public function actionPassword()
    {
        echo 'Users change pwd page';
    }
}