<?php

namespace App\repo;

use App\service\ISingleton;
use App\tools\Preconditions;

/**
 * Menu repository
 */
class FileRepo extends ModelRepo implements ISingleton
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

    /**
     * @throws \Exception
     */
    public function addByPath(string $path, string $relativePath): int
    {
        Preconditions::checkEmpty($path);
        $img      = getimagesize($path);
        $fileSize = filesize($path);
        $fileInfo = pathinfo($path);
        $params   = [
          'file_name' => $fileInfo['basename'],
          'file_size' => $fileSize,
          'file_type' => 'image',
          'file_path' => $relativePath,
        ];

        return $this->add($params);
    }

    public function add(array $data): int
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

}

