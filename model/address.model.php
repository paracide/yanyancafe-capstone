<?php

function addAddress(PDO $conn, array $address, int $userId): int
{
    checkEmpty($userId);
    $query = 'INSERT INTO address
(user_id, street, province, country, city, postal_code)
VALUES (:user_id, :street, :province, :country, :city, :postal_code);';

    $stmt  = $conn->prepare($query);
    $param = [
      ':user_id'     => $userId,
      ':street'      => $address['street'],
      ':province'    => $address['province'],
      ':country'     => $address['country'],
      ':city'        => $address['city'],
      ':postal_code' => $address['postal_code'],
    ];
    $stmt->execute($param);

    return intval($conn->lastInsertId());
}

