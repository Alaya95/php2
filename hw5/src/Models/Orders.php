<?php

namespace MyApp\Models;

class Orders extends Model
{
    const STATUS_NEW = 1;
    const STATUS_PROGRESS = 2;
    const STATUS_REJECTED = 3;
    const STATUS_DONE = 4;

    const TABLE_ORDERS = 'orders';
    const TABLE_ORDERS_GOODS = 'orders_goods';

    public static function get($userId)
    {
        return self::link()
            ->query('SELECT 
                    orders_goods.id, orders_goods.order_id,
                    orders.`date` AS order_date,
                    goods.title as title,
                    orders_goods.`price`, `count`
                FROM ' . self::TABLE_ORDERS_GOODS . '
                LEFT JOIN orders ON order_id = orders.id
                LEFT JOIN goods ON good_id = goods.id
                where orders.user_id=' . $userId
                . ' ORDER BY order_date desc ')
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function add($userId, $goodsCounts): int
    {
        self::link()->exec(
            'INSERT INTO ' . self::TABLE_ORDERS
            . ' SET user_id=' . (int)$userId
            . ', status=' . self::STATUS_NEW
        );

        $orderId = self::link()->lastInsertId();

        foreach ($goodsCounts as $id => $count) {
            $good = Goods::getById($id);
            self::link()->exec(
                'INSERT INTO ' . self::TABLE_ORDERS_GOODS
                . ' SET order_id=' . $orderId
                . ', good_id=' . (int)$id
                . ', price=' . $good['price']
                . ', `count`=' . (int)$count
            );
        }

        return $orderId;
    }

    public static function getOrders()
    {
        return self::link()
            ->query('SELECT 
                    orders_goods.id, orders_goods.order_id,
                    orders.`date` AS order_date,
                    goods.title as title,
                    orders_goods.`price`, `count`
                FROM ' . self::TABLE_ORDERS_GOODS . '
                LEFT JOIN orders ON order_id = orders.id
                LEFT JOIN goods ON good_id = goods.id
                ORDER BY order_date desc ')
            ->fetchAll(\PDO::FETCH_ASSOC);
    }


}