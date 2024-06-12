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

    public static function cartSummary(): array
    {
        $cart = $_SESSION[Constant::SESSION_CART] ?? [];

        $subTotal = self::getSubTotalPrice($cart);

        return [
          'cart'     => $cart,
          'subTotal' => $subTotal,
          'tax'      => number_format($subTotal * 0.12, 2),
          'total'    => number_format($subTotal * 1.12, 2),
        ];
    }

    public static function getSubTotalPrice($cart): float
    {
        return $cart ? array_reduce($cart, function ($carry, $food) {
            return $carry + $food['totalPrice'];
        }) : 0;
    }

    /**
     * @param   mixed  $cart
     *
     * @return int|mixed
     */
    public static function getSubTotal(mixed $cart): mixed
    {
        $subTotal = $cart ? array_reduce($cart, function ($carry, $food) {
            return $carry + $food['totalPrice'];
        }) : 0;

        return $subTotal;
    }

}
