<?php

namespace App\admin\api;

global
$menuRepo, $fileRepo, $conn;
use App\tools\AdminRouter;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Validator;

const IMG_FILE_NAME = 'picture';

Preconditions::checkPostRequest();
$require       = [
  "name",
  "description",
  "category_id",
  "price",
  "size",
  "discount",
  "calorie_count",
];
$price         = $_POST['price'];
$size          = $_POST['size'];
$discount      = $_POST['discount'];
$calorie_count = $_POST['calorie_count'];
$validator     = new Validator();
$validator->checkRequired($require, $_POST);
$validator->checkNum($price, "price", 1, 999);
$validator->checkImg(IMG_FILE_NAME);
$validator->checkNum($discount, "discount", 0, 99);
$validator->checkNum($calorie_count, "$calorie_count", 0, 9999);

//error go back to register
$errors = $validator->getError();

if (count($errors)) {
    $resultError        = array_map(function ($msg) {
        return implode(" ", $msg);
    }, $errors);
    $_SESSION['errors'] = $resultError;
    $_SESSION['post']   = $_POST;
    AdminRouter::fail(AdminRouter::menu_add);
}

//prepare data
$available = ($_POST['availability'] ?? '') === 'on' ? 1 : 0;
$takeaway  = ($_POST['is_take_away'] ?? '') === 'on' ? 1 : 0;
$arr       = [
  'name'          => $_POST['name'],
  'description'   => trim($_POST['description'] ?? ''),
  'category_id'   => $_POST['category_id'],
  'price'         => $price,
  'size'          => $size,
  'discount'      => $discount,
  'calorie_count' => $calorie_count,
  'availability'  => $available,
  'is_take_away'  => $takeaway,
];

$menuRepo->newMenu($arr, $_FILES[IMG_FILE_NAME]);
FlashUtils::success("Menu added successfully");
AdminRouter::success(AdminRouter::menu);


