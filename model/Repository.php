<?php

class Repository
{

    protected static PDO $conn;

    protected string $table;

    protected string $key = 'id';

    /**
     * init connection globally
     *
     * @param   \PDO  $conn
     *
     * @return void
     */
    public static function init(PDO $conn): void
    {
        self::$conn = $conn;
    }

    /**
     * get all data according to table name
     *
     * @return array
     */
    public function getAll(?bool $isDel): array
    {
        $query = "SELECT * FROM {$this->table}";
        if ($isDel !== null) {
            $query .= $isDel ? " WHERE is_del = 1" : " WHERE is_del = 0";
        }
        $stmt = self::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * get data by id
     *
     * @param   int  $id
     *
     * @return mixed
     * @throws \Exception when id is empty
     */
    public function getById(int $id, ?bool $isDel)
    {
        Preconditions::checkEmpty($id);
        $query
          = "SELECT * FROM {$this->table} WHERE {$this->key} = :id";
        if ($isDel !== null) {
            $query .= $isDel ? " and is_del = 1" : " and is_del = 0";
        }
        $stmt   = self::$conn->prepare($query);
        $params = [
          ':id' => $id,
        ];
        $stmt->execute($params);

        return $stmt->fetch();
    }

}
