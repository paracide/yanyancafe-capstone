<?php

global $menuRepo;
use App\tools\Preconditions;

Preconditions::checkPostRequest();

$menuId = $_POST['menuId'];
$menu   = $menuRepo->searchById($menuId);

if ( ! isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$menuId])) {
    $_SESSION['cart'][$menuId]['quantity'] += 1;
} else {
    $_SESSION['cart'][$menuId]             = $menu;
    $_SESSION['cart'][$menuId]['quantity'] = 1;
}

$response = [
  'success' => true,
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
