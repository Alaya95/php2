<?php

namespace MyApp\Controllers;

use MyApp\Models\Users;

class AccountController extends Controller
{
    //основные данные

    public function actionIndex()
    {
        //если входа не выполнено, то вызываем страницу с входом в личный кабинет и регистрацией..
        if (empty($_SESSION['username'])) {
            $this->render("signIn.twig");
        } else {
            $this->render("account.twig", [
                'users' => $_SESSION['username'],
            ]);
        }

        // Вход в лк. Если вход выполнен успешно, то загружаем страницу с аккаунтом
        //$pass = Users::check($_GET['username'], $_GET['password']);
        if ($users = Users::check($_GET['username'], $_GET['password'])) {
            $_SESSION['username'] = $_GET['username'];
        }

        // регистрация
        if (isset($_POST['username'])) {
            Users::add($_POST['username'], $_POST['password']);
            $this->redirect();
        }
    }

    //настройки пользователя
    public function actionSettings()
    {
    }

    public static function logout()
    {
        //????
        $_SESSION['user'] = null;
    }

    //смена пароля
    public function actionPassword()
    {
        echo 'users password';
        $this->render("changePassword.twig");
    }

}