<?php

global $menuRepo;
use App\constant\Constant;
use App\tools\Preconditions;

Preconditions::checkPostRequest();

$menuId = $_POST['menuId'];
$menu   = $menuRepo->searchById($menuId);

$quantity    = ($_SESSION[Constant::SESSION_CART][$menuId]['quantity'] ?? 0)
               + 1;
$actualPrice = $menu['price'] * (100 - $menu['discount']) / 100;

$food = [
  'name'       => $menu['name'],
  'img'        => $menu['file_path'],
  'price'      => $actualPrice,
  'quantity'   => $quantity,
  "totalPrice" => $actualPrice * $quantity,
];

$_SESSION[Constant::SESSION_CART][$menuId] = $food;

$response = [
  'success' => true,
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
