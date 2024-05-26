<?php

class AddressRepository extends Repository
{

    protected string $table = "address";

    private static ?AddressRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): AddressRepository
    {
        if (self::$instance === null) {
            self::$instance = new AddressRepository();
        }

        return self::$instance;
    }

    /**
     * @throws \Exception
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

