<?php

namespace App\model;

use App\interface\ISingleton;
use App\tools\Preconditions;

/**
 * Menu repository
 */
class FileRepo extends Repository implements ISingleton
{

    private static ?FileRepo $instance = null;

    protected string $table = "file";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): FileRepo
    {
        if (self::$instance === null) {
            self::$instance = new FileRepo();
        }

        return self::$instance;
    }

    private function add(array $data): int
    {
        $query = 'INSERT INTO file
              (file_name, file_size, file_type, file_path, is_del)
              VALUES (:file_name, :file_size, :file_type, :file_path, :is_del);';

        $stmt   = parent::$conn->prepare($query);
        $params = [
          ':file_name' => $data['file_name'],
          ':file_size' => $data['file_size'],
          ':file_type' => $data['file_type'],
          ':file_path' => $data['file_path'],
          ':is_del'    => 0,
        ];

        $stmt->execute($params);

        return intval(parent::$conn->lastInsertId());
    }

    /**
     * @throws \Exception
     */
    private function updateMenuItem(array $data): bool
    {
        Preconditions::checkEmpty($data['id']);
        $query  = 'UPDATE menu SET ';
        $params = [];
        $fields = [];

        foreach ($data as $key => $value) {
            if ($key !== 'id') {
                $fields[]          = "{$key} = :{$key}";
                $params[":{$key}"] = $key === 'price' ? number_format($value, 2)
                  : $value;
            }
        }
        if (empty($fields)) {
            return false;
        }

        $query         .= implode(', ', $fields);
        $query         .= ' WHERE id = :id';
        $params[':id'] = $data['id'];

        $stmt = parent::$conn->prepare($query);

        return $stmt->execute($params);
    }

}

