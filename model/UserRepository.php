<?php

class UserRepository extends Repository
{

    protected string $table = "user";

    private static ?UserRepository $instance = null;

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): UserRepository
    {
        if (self::$instance === null) {
            self::$instance = new UserRepository();
        }

        return self::$instance;
    }

    /**
     * Add user profile with address
     *
     * @param   array  $user
     *
     * @return int
     */
    public function addUserProfile(array $user): int
    {
        global $addressRepository;
        // Start transaction due to multiple insert
        try {
            parent::$conn->beginTransaction();
            $userId = $this->addUser($user);
            $addressRepository->addAddress($user, $userId);
            parent::$conn->commit();

            return $userId;
        } catch (Exception $e) {
            parent::$conn->rollBack();
            Router::go500($e);
        }

        return 0;
    }

    /**
     * Add user
     *
     * @param   array  $user
     *
     * @return int user id
     * @throws \Exception throw exception if user id is empty
     */
    public function addUser(array $user): int
    {
        $email    = Preconditions::checkEmpty($user['email']);
        $password = password_hash(
          Preconditions::checkEmpty($user['password']),
          PASSWORD_DEFAULT
        );

        $query = 'INSERT INTO user
                  (email, password, first_name, last_name, birthday, phone, subscribe_to_newsletter)
                   VALUES (:email, :password, :first_name, :last_name, :birthday, :phone, :subscribe_to_newsletter);';

        $stmt  = parent::$conn->prepare($query);
        $param = [
          ':email'                   => $email,
          ':password'                => $password,
          ':first_name'              => $user['first_name'],
          ':last_name'               => $user['last_name'],
          ':birthday'                => $user['birthday'],
          ':phone'                   => $user['phone'],
          ':subscribe_to_newsletter' => empty($user['subscribe_to_newsletter'])
            ? 0
            : 1,
        ];
        $stmt->execute($param);

        return intval(parent::$conn->lastInsertId());
    }

    /**
     * Get user profile by id including address
     *
     * @param   int  $id
     *
     * @return array
     * @throws \Exception
     */
    public function getUserProfileById(int $id): array
    {
        Preconditions::checkEmpty($id);
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
        and a.is_del = 0;';

        $stmt  = parent::$conn->prepare($query);
        $param = [
          ':user_id' => $id,
        ];
        $stmt->execute($param);
        $result = $stmt->fetch();

        return $result ? $result : [];
    }

    /**
     * Get user by email including the password
     *
     * @param   string  $email
     *
     * @return array
     * @throws \Exception
     */
    public function getUserByEmail(string $email): array
    {
        Preconditions::checkEmpty($email);
        $query = 'SELECT *
        FROM user u
        WHERE u.email = :email
        and u.is_del = 0';

        $stmt  = parent::$conn->prepare($query);
        $param = [
          ':email' => $email,
        ];
        $stmt->execute($param);
        $result = $stmt->fetch();

        return $result ? $result : [];
    }

}

