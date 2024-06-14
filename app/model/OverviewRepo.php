<?php

namespace App\model;

use App\interface\ISingleton;

/**
 * Category repository
 */
class OverviewRepo extends Repo implements ISingleton
{

    private static ?OverviewRepo $instance = null;

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): OverviewRepo
    {
        if (self::$instance === null) {
            self::$instance = new OverviewRepo();
        }

        return self::$instance;
    }

    public function menu(): array
    {
        $query = "
select c.name as cat_name, sum(t.count) as menu_count
from (
         select c.parent_id, count(*) as count
         from menu
                  join category c on c.id = menu.category_id
         where menu.is_del = 0
         group by c.parent_id
     ) t
         join category c on t.parent_id = c.id
group by c.name;

    ";

        $stmt = parent::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function order(): array
    {
        $query = "select sum(total_price) revenue, min((total_price)) min, max(total_price) max
from orders
    ";

        $stmt = parent::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function file(): float
    {
        $query = "select sum(file_size) size from file";

        $stmt = parent::$conn->prepare($query);
        $stmt->execute();

        $size = $stmt->fetch();

        return $size ? number_format($size['size'] / (1024 * 1024), 0) : 0;
    }

}
