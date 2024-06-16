<?php

namespace App\repo;

use App\service\ISingleton;

/**
 * Category repository
 */
class CategoryRepo extends ModelRepo implements ISingleton
{

    private static ?CategoryRepo $instance = null;

    protected string $table = "category";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): CategoryRepo
    {
        if (self::$instance === null) {
            self::$instance = new CategoryRepo();
        }

        return self::$instance;
    }

    /**
     * Get all category of menu
     * @return array
     */
    public function searchMenuCat(): array
    {
        $query = "select *
                    from category
                    where parent_id in (select id from category where parent_id = 1)";
        $stmt  = self::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

}

