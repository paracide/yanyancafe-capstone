<?php

namespace App\model;

use App\interface\ISingleton;
use App\tools\Preconditions;

/**
 * Menu repository
 */
class MenuRepo extends Repository implements ISingleton
{

    private static ?MenuRepo $instance = null;

    protected string $table = "menu";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): MenuRepo
    {
        if (self::$instance === null) {
            self::$instance = new MenuRepo();
        }

        return self::$instance;
    }

    /**
     * Search menu by key and category with category name and image path
     * @throws \Exception
     */
    public function search(?string $key, ?string $category): array
    {
        $query = "select menu.*, c.name as category, f.file_path
                from menu
                left join capstone.category c on c.id = menu.category_id
                left join file f on menu.img_file_id = f.id
                where menu.is_del = 0";

        $params = [];

        if ( ! empty($key)) {
            $query          .= " and menu.name like :key";
            $params[':key'] = '%' . $key . '%';
        }

        if ( ! empty($category)) {
            $query                 .= " and menu.category_id = :categoryId";
            $params[':categoryId'] = $category;
        }

        $stmt = self::$conn->prepare($query);

        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    /**
     * get menu by id with category name and image path
     * @throws \Exception
     */
    public function searchById($id): array
    {
        Preconditions::checkEmpty($id);
        $query = "select menu.*, c.name as category, f.file_path
                from menu
                left join capstone.category c on c.id = menu.category_id
                left join file f on menu.img_file_id = f.id
                where menu.is_del = 0  and menu.id = :id";
        $stmt  = self::$conn->prepare($query);
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

}

