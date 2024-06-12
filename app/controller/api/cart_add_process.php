<?php

global $menuRepo;
use App\constant\Constant;
use App\interface\service\CartService;
use App\tools\Preconditions;

Preconditions::checkPostRequest();

$menuId = $_POST['menuId'];

CartService::addFood($menuId);
$response = [
  'success' => true,
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
