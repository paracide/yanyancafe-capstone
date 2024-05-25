<?php

function addUserProfile(array $user): int
{
    global $conn;
    try {
        $conn->beginTransaction();
        $userId = addUser($user);
        addAddress($conn, $user, $userId);
        $conn->commit();

        return $userId;
    } catch (Exception $e) {
        $conn->rollBack();
        go500($e);
    }

    return -1;
}

function addUser(array $user): int
{
    global $conn;
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
      ':subscribe_to_newsletter' => empty($user['subscribe_to_newsletter']) ? 0
        : 1,
    ];
    $stmt->execute($param);

    return intval($conn->lastInsertId());
}

function getUserProfileById(int $id): array
{
    global $conn;
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
    $result = $stmt->fetch();

    return $result ? $result : [];
}

function getUserByEmail(string $email): array
{
    global $conn;
    $query = 'SELECT u.id,
       u.email,
       u.first_name,
       u.last_name,
       u.birthday,
       u.phone
        FROM user u
        WHERE u.email = :email
         and u.is_del = 0
';

    $stmt  = $conn->prepare($query);
    $param = [
      ':email' => $email,
    ];
    $stmt->execute($param);
    $result = $stmt->fetch();

    return $result ? $result : [];
}

