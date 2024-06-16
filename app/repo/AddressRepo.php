<?php

namespace App\repo;

use App\service\ISingleton;
use App\tools\Preconditions;

class AddressRepo extends ModelRepo implements ISingleton
{

    private static ?AddressRepo $instance = null;

    protected string $table = "address";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): AddressRepo
    {
        if (self::$instance === null) {
            self::$instance = new AddressRepo();
        }

        return self::$instance;
    }

    /**
     * add address
     *
     * @param   array  $address  address information
     * @param   int    $userId
     *
     * @return int address id
     * @throws \Exception throw exception if user id is empty
     */
    public function addAddress(array $address, int $userId): int
    {
        Preconditions::checkEmpty($userId);
        $query = 'INSERT INTO address
                  (user_id, street, province, country, city, postal_code)
                   VALUES (:user_id, :street, :province, :country, :city, :postal_code)';

        $stmt  = parent::$conn->prepare($query);
        $param = [
          ':user_id'     => $userId,
          ':street'      => $address['street'],
          ':province'    => $address['province'],
          ':country'     => $address['country'],
          ':city'        => $address['city'],
          ':postal_code' => $address['postal_code'],
        ];
        $stmt->execute($param);

        return intval(parent::$conn->lastInsertId());
    }

}

