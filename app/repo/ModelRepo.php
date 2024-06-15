<?php

namespace App\repo;

use App\tools\Preconditions;

abstract class ModelRepo extends Repo
{

    protected string $table;

    protected string $key = 'id';

    /**
     * get all data according to table name
     *
     * @param   bool|null  $isDel
     *
     * @return array
     */
    public function getAll(?bool $isDel = false): array
    {
        $query = "SELECT * FROM {$this->table}";
        if ($isDel !== null) {
            $query .= $isDel ? " WHERE is_del = 1" : " WHERE is_del = 0";
        }
        $query .= " order by $this->key desc";
        $stmt  = self::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * get data by id
     *
     * @param   int        $id
     * @param   bool|null  $isDel
     *
     * @return mixed
     * @throws \Exception when id is empty
     */
    public function getById(int $id, ?bool $isDel = false): mixed
    {
        Preconditions::checkEmpty($id);
        $query
          = "SELECT * FROM {$this->table} WHERE {$this->key} = :id";
        if ($isDel !== null) {
            $query .= $isDel ? " and is_del = 1" : " and is_del = 0";
        }
        $stmt = self::$conn->prepare($query);
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function count(?bool $isDel = false)
    {
        $query
          = "SELECT count(1) count FROM {$this->table} ";
        if ($isDel !== null) {
            $query .= $isDel ? " where is_del = 1" : " where is_del = 0";
        }
        $stmt = self::$conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch();

        return empty($result) ? 0 : $result['count'];
    }

}
