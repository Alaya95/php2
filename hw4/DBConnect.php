<?php

class DBConnect
{
    public const TABLE_GOODS = 'product';
    private static $config = [
        'host' => 'localhost',
        'user' => 'root',
        'pwd' => 'root',
        'db' => 'goods',
        'port' => '3307'
    ];

    static int $count = 0;

    private static $instance;
    private $link;

    public function getAllData($tableName)
    {
        return $this->link
            ->query('SELECT * FROM ' . $tableName . ' LIMIT 0,5')
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function getShowMore($tableName)
    {
        return $this->link
            ->query('SELECT * FROM ' . $tableName . ' LIMIT 5,5')
            ->fetch_all(MYSQLI_ASSOC);
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    private function __construct()
    {
        $this->link = mysqli_connect(
            self::$config['host'],
            self::$config['user'],
            self::$config['pwd'],
            self::$config['db'],
            self::$config['port'],
        );

        if (false === $this->link) {
            die("can't connect to DB");
        }
    }

}