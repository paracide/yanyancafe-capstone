<?php

class Repository
{

    protected static PDO $conn;

    protected string $table;

    protected string $key = 'id';



    public static function init(PDO $conn): void
    {
        self::$conn = $conn;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt  = self::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getById(int $id)
    {
        $query  = "SELECT * FROM {$this->table} WHERE {$this->key} = :id";
        $stmt   = self::$conn->prepare($query);
        $params = [
          ':id' => $id,
        ];
        $stmt->execute($params);

        return $stmt->fetch();
    }

}
