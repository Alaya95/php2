<?php

namespace MyApp\Models;

class Users extends Model
{
    /* Для присваивания ролей при регистрации
    const ROLE_ADMIN = 1;
    const ROLE_CONTENT = 2;
    const ROLE_USER = 3;
    */

    const TABLE_USERS = 'users';
    const TABLE_USERS_ROLES = 'users_roles';
/*
    //добавление пользователя в базу данных, при регистрации по умолчанию будет присваиваться роль user

    public static function add($username, $password)
    {
        if (empty($login) || empty($password)) {
            return;
        }

        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = self::link()->prepare("INSERT INTO " . self::TABLE_USERS . " SET login=:login, pass=:passwords ");
        $stmt->bindParam(':login', $login, \PDO::PARAM_STR);
        $stmt->bindParam(':passwords', $passHash, \PDO::PARAM_STR);
        $stmt->execute();
    }
*/
    public static function get($login)
    {
        $stmt = self::link()->prepare("SELECT * FROM " . self::TABLE_USERS . " WHERE login=:login");
        $stmt->bindParam(':login', $login, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function check($login, $password)
    {
        $user = self::get($login);
        if (!$user) {
            return false;
        }

        return password_verify($password, $user['pass']);
    }

    public static function getUsersRole($userId) {
        return self::link()
            ->query("SELECT role FROM " . self::TABLE_USERS_ROLES . " WHERE user_id = " . (int)$userId)
            ->fetchAll(\PDO::FETCH_ASSOC);
    }
}