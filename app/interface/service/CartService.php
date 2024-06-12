<?php

namespace App\interface\service;

use App\constant\Constant;

/**
 * CartService
 *
 */
class CartService
{

    /**
     * add food to cart, if food already in cart, increase quantity
     * the price of food is calculated with discount
     *
     * @param $menuId
     *
     * @return void
     * @throws \Exception if menu not found
     */
    public static function addFood($menuId): void
    {
        global $menuRepo;
        $menu = $menuRepo->searchById($menuId);

        //quantity plus 1
        $quantity = ($_SESSION[Constant::SESSION_CART][$menuId]['quantity']
                     ?? 0)
                    + 1;
        //calculate actual price
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

    /**
     * delete food from cart
     *
     * @param $menuId
     *
     * @return void
     */
    public static function delFood($menuId): void
    {
        unset($_SESSION[Constant::SESSION_CART][$menuId]);
    }

    /**
     * clear cart
     *
     * @return void
     */
    public static function clearFood(): void
    {
        unset($_SESSION[Constant::SESSION_CART]);
    }

    /**
     * get cart summary, the total price is calculated with tax
     *
     * @return array
     */
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

    /**
     * get total price of cart without tax
     *
     * @param $cart
     *
     * @return float
     */
    public static function getSubTotalPrice($cart): float
    {
        return $cart ? array_reduce($cart, function ($carry, $food) {
            return $carry + $food['totalPrice'];
        }) : 0;
    }

}
