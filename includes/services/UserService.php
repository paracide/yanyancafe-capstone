<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/AddressService.php';

/**
 * @param $user
 *
 * @return int
 * @throws \Exception when email or password is empty
 *
 */

function addUserProfile($conn, $user): int
{
    try {
        $conn->beginTransaction();
        $userId = addUser($conn, $user);
        addAddress($conn, $user, $userId);
        $conn->commit();

        return $userId;
    } catch (Exception $e) {
        $conn->rollBack();
        error_log($e->getMessage());
        header('Location: ../error.php');
    }
}

function addUser($conn, $user): int
{
    $email    = checkEmpty($user['email']);
    $password = checkEmpty($user['password']);

    $query = 'INSERT INTO user
(email, password, first_name, last_name, birthday, phone, subscribe_to_newsletter)
VALUES (:email, :password, :first_name, :last_name, :birthday, :phone, :subscribe_to_newsletter);';

    $stmt  = $conn->prepare($query);
    $param = [
      ':email'                   => $email,
      ':password'                => $password,
      ':first_name'              => $user['first_name'],
      ':last_name'               => $user['last_name'],
      ':birthday'                => $user['birthday'],
      ':phone'                   => $user['phone'],
      ':subscribe_to_newsletter' => empty($user['subscribe_to_newsletter']) ? 0 : 1,
    ];
    $stmt->execute($param);

    return $conn->lastInsertId();
}

function getUserProfileById($conn,int $id)
{
    $query = 'SELECT u.id,
       u.email,
       u.first_name,
       u.last_name,
       u.birthday,
       u.phone,
       a.street,
       a.province,
       a.country,
       a.city,
       a.postal_code
FROM user u
         LEFT JOIN address a ON u.id = a.user_id
WHERE u.id = :user_id
  and u.is_del = 0
  and a.is_del = 0;
';

    $stmt  = $conn->prepare($query);
    $param = [
      ':user_id' => $id,
    ];
    $stmt->execute($param);

    return $stmt->fetch();
}
