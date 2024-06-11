<?php

namespace App\model;

use App\interface\ISingleton;
use App\interface\service\CartService;
use App\tools\Auth;
use App\tools\Router;

class OrderRepo extends Repository implements ISingleton
{

    private static ?OrderRepo $instance = null;

    protected string $table = "order";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): OrderRepo
    {
        if (self::$instance === null) {
            self::$instance = new OrderRepo();
        }

        return self::$instance;
    }

    public function addOrder(int $userId, float $total, string $cardNo): int
    {
        $query = 'INSERT INTO `order`
                  (user_id, price, status, is_del)
                  VALUES (:user_id, :price, :status, :is_del);';

        $stmt   = parent::$conn->prepare($query);
        $params = [
          ':user_id'        => $userId,
          ':price'          => $total,
          ':status'         => 'delivered',
          ':credit_card_no' => $cardNo,
          ':is_del'         => 0,
        ];

        $stmt->execute($params);

        return intval(parent::$conn->lastInsertId());
    }

    public function newOrder(array $cart, string $cardNo): int
    {
        global $orderDetailRepo;
        if (empty($cart)) {
            return 0;
        }

        try {
            parent::$conn->beginTransaction();

            $orderId = $this->addOrder(
              Auth::getUserId(),
              CartService::getTotal($cart),
              $cardNo
            );

            foreach ($cart as $food) {
                $params = [
                  'order_id'   => $orderId,
                  'menu_id'    => $food['id'],
                  'quantity'   => $food['quantity'],
                  'unit_price' => $food['actualPrice'],
                ];
                $orderDetailRepo->addOrderDetail(
                  $params
                );
            }

            parent::$conn->commit();

            return $orderId;
        } catch (Exception $e) {
            parent::$conn->rollBack();
            Router::errorPage($e);
        }

        return 0;
    }

}

