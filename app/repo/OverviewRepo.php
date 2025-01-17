<?php

namespace App\repo;

use App\service\ISingleton;

/**
 * Overview Statistics Summary repository
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

    /**
     * get menu count group by primary menu category
     *
     * @return array
     */
    public function menu(): array
    {
        $query = "select c.name as cat_name, sum(t.count) as menu_count
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

    /**
     * get sum of revenue, min and max order price
     *
     * @return array
     */
    public function order(): array
    {
        $query = "select sum(total_price) revenue, min((total_price)) min,
                    max(total_price) max
                    from orders
    ";

        $stmt = parent::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * get sum of file size
     *
     * @return float
     */
    public function file(): float
    {
        $query = "select sum(file_size) size from file";

        $stmt = parent::$conn->prepare($query);
        $stmt->execute();

        $size = $stmt->fetch();

        return $size ? number_format($size['size'] / (1024 * 1024)) : 0;
    }

    /**
     * get the latest user
     *
     * @return array
     */
    public function user(): array
    {
        $query = "select created_at, first_name, last_name
                    from user where is_del=0
                    order by id desc 
                    limit 1;
";

        $stmt = parent::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetch();
    }

}
