<?php

namespace App\model;

use App\interface\ISingleton;
use App\interface\service\CartService;
use App\tools\Auth;
use App\tools\Router;

class OrdersRepo extends Repository implements ISingleton
{

    private static ?OrdersRepo $instance = null;

    protected string $table = "orders";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): OrdersRepo
    {
        if (self::$instance === null) {
            self::$instance = new OrdersRepo();
        }

        return self::$instance;
    }

    /*
     * Add order only, dont contain order detail.
     * The actual way to add is using newOrder method
     */
    private function addOrder(int $userId, float $price, string $cardNo): int
    {
        $query = 'INSERT INTO orders
              (user_id, price, gst, pst, total_price, status, credit_card_no, is_del)
              VALUES (:user_id, :price, :gst, :pst, :total_price, :status, :credit_card_no, :is_del);';

        $stmt   = parent::$conn->prepare($query);
        $params = [
          ':user_id'        => $userId,
          ':price'          => $price,
          ':gst'            => number_format($price * 0.05, 2),
          ':pst'            => number_format($price * 0.07, 2),
          ':total_price'    => number_format($price * 1.12, 2),
          ':status'         => 'delivered',
          ':credit_card_no' => $cardNo,
          ':is_del'         => 0,
        ];

        $stmt->execute($params);

        return intval(parent::$conn->lastInsertId());
    }

    /**
     * Add new order and order detail using cart
     *
     * @param   array   $cart
     * @param   string  $cardNo
     *
     * @return int
     */
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
              CartService::getSubTotalPrice($cart),
              $cardNo
            );

            foreach ($cart as $food) {
                $params = [
                  'order_id'   => $orderId,
                  'menu_id'    => $food['id'],
                  'quantity'   => $food['quantity'],
                  'unit_price' => $food['price'],
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

    /**
     * Search all the orders by user id
     */
    public function searchById($userId): array
    {
        $query = "SELECT * FROM orders WHERE user_id = :user_id AND is_del = 0";
        $stmt  = parent::$conn->prepare($query);
        // Bind the user_id parameter
        $stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
        // Execute the query
        $stmt->execute();

        return $stmt->fetchAll();
    }

}

