<?php

namespace App\model;

use App\interface\ISingleton;

class OrderDetailRepo extends Repository implements ISingleton
{

    private static ?OrderDetailRepo $instance = null;

    protected string $table = "order_detail";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): OrderDetailRepo
    {
        if (self::$instance === null) {
            self::$instance = new OrderDetailRepo();
        }

        return self::$instance;
    }

    public function addOrderDetail(array $orderDetail): int
    {
        $query = 'INSERT INTO order_detail
                  (order_id, menu_id, quantity, unit_price, is_del)
                  VALUES (:order_id, :menu_id, :quantity, :unit_price, :is_del);';

        $stmt   = parent::$conn->prepare($query);
        $params = [
          ':order_id'   => $orderDetail['order_id'],
          ':menu_id'    => $orderDetail['menu_id'],
          ':quantity'   => $orderDetail['quantity'],
          ':unit_price' => $orderDetail['unit_price'],
          ':is_del'     => 0,
        ];

        $stmt->execute($params);

        return intval(parent::$conn->lastInsertId());
    }

}

