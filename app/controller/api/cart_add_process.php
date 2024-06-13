<?php
namespace App\controller\api;

global $menuRepo;
use App\interface\service\CartService;
use App\tools\Preconditions;

/**
 * This controller is used to add food to cart
 * return json response
 */
Preconditions::checkPostRequest();

/**
 * Add food to cart
 */
$menuId = $_POST['menuId'];
CartService::addFood($menuId);
$response = [
  'success' => true,
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
