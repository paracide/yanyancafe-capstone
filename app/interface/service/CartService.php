<?php

namespace App\interface\service;

use App\constant\Constant;

class CartService
{

    public static function addFood($menuId): void
    {
        global $menuRepo;
        $menu = $menuRepo->searchById($menuId);

        $quantity    = ($_SESSION[Constant::SESSION_CART][$menuId]['quantity']
                        ?? 0)
                       + 1;
        $actualPrice = $menu['price'] * (100 - $menu['discount']) / 100;

        $food = [
          'id'         => $menu['id'],
          'name'       => $menu['name'],
          'img'        => $menu['file_path'],
          'price'      => $actualPrice,
          'quantity'   => $quantity,
          "totalPrice" => $actualPrice * $quantity,
        ];

        $_SESSION[Constant::SESSION_CART][$menuId] = $food;
    }

    public static function delFood($menuId): void
    {
        unset($_SESSION[Constant::SESSION_CART][$menuId]);
    }

    public static function clearFood(): void
    {
        unset($_SESSION[Constant::SESSION_CART]);
    }

}
