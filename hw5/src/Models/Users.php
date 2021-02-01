<?php


namespace MyApp\Models;

use MyApp\App;

class Users extends Model
{
    const TABLE_USERS = 'users';

    public static function add($username, $password)
    {
        if (empty($username) || empty($password)) {
            return;
        }
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = self::link()->prepare("INSERT INTO " . self::TABLE_USERS . " SET username = :username, passwords = :passwords ");
        $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
        $stmt->bindParam(':passwords', $passHash, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function getUsername($username)
    {

        $stmt = self::link()->prepare("SELECT * FROM " . self::TABLE_USERS . " WHERE username = :username");
        $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function check($username, $password)
    {
        if ($username = self::getUsername($username)) {
            return password_verify($password, $username['passwords']);
        }
    }
}