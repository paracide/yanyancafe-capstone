<?php

global $menuRepo;
use App\constant\Constant;
use App\tools\Preconditions;

Preconditions::checkPostRequest();

$menuId = $_POST['menuId'];
$menu   = $menuRepo->searchById($menuId);

if ( ! isset($_SESSION['cart'])) {
    $_SESSION[Constant::SESSION_CART] = [];
}

if (isset($_SESSION[Constant::SESSION_CART][$menuId])) {
    $_SESSION[Constant::SESSION_CART][$menuId]['quantity'] += 1;
} else {
    $_SESSION[Constant::SESSION_CART][$menuId]             = $menu;
    $_SESSION[Constant::SESSION_CART][$menuId]['quantity'] = 1;
}

$response = [
  'success' => true,
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
