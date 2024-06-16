<?php

namespace App\repo;

use App\service\ISingleton;

/**
 * OrderDetail repository
 */
class OrderDetailRepo extends ModelRepo implements ISingleton
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

    /*
     * Add order detail
     */
    public function addOrderDetail(array $orderDetail): int
    {
        $query = 'INSERT INTO order_detail
                  (order_id, menu_id, quantity, unit_price,line_price, is_del)
                  VALUES (:order_id, :menu_id, :quantity, :unit_price,:line_price, :is_del);';

        $stmt      = parent::$conn->prepare($query);
        $quantity  = $orderDetail['quantity'];
        $unitPrice = $orderDetail['unit_price'];
        $params    = [
          ':order_id'   => $orderDetail['order_id'],
          ':menu_id'    => $orderDetail['menu_id'],
          ':quantity'   => $quantity,
          ':unit_price' => $unitPrice,
          ':line_price' => number_format($unitPrice * $quantity, 2),
          ':is_del'     => 0,
        ];

        $stmt->execute($params);

        return intval(parent::$conn->lastInsertId());
    }

    /**
     * Search all the order details by order id with menu name
     */
    public function searchByOrderId(int $orderId): array
    {
        $query = 'SELECT o.*, m.name menu
            FROM order_detail o
         join capstone.menu m on m.id = o.menu_id
    WHERE order_id = :order_id and m.is_del=0';
        $stmt  = parent::$conn->prepare($query);
        $stmt->execute([':order_id' => $orderId]);

        return $stmt->fetchAll();
    }

}

