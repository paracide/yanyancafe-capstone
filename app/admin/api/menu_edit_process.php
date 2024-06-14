<?php

namespace App\admin\api;

global
$menuRepo, $fileRepo, $conn;
use App\constant\HttpStatus;
use App\interface\service\FileService;
use App\tools\AdminRouter;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Validator;

const IMG_FILE_NAME = 'picture';

Preconditions::checkPostRequest();
$menuId = $_POST['id'];
Preconditions::checkEmpty($menuRepo->getById($menuId));

//validate
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
$validator->checkNum($price, "price");
$validator->checkNum($discount, "discount");
$validator->checkNum($calorie_count, "$calorie_count");

//error go back to register
$errors = $validator->getError();

if (count($errors)) {
    $resultError        = array_map(function ($msg) {
        return implode(" ", $msg);
    }, $errors);
    $_SESSION['errors'] = $resultError;
    $_SESSION['post']   = $_POST;
    AdminRouter::fail(
      AdminRouter::menu_add,
      HttpStatus::INTERNAL_SERVER_ERROR,
      "&menu_id="
    );
}
//prepare data
$available = ($_POST['availability'] ?? '') === 'on' ? 1 : 0;
$takeaway  = ($_POST['is_take_away'] ?? '') === 'on' ? 1 : 0;
$menuData  = [
  "id"            => $menuId,
  'name'          => $_POST['name'],
  'description'   => $_POST['description'],
  'category_id'   => $_POST['category_id'],
  'price'         => $price,
  'size'          => $size,
  'discount'      => $discount,
  'calorie_count' => $calorie_count,
  'availability'  => $available,
  'is_take_away'  => $takeaway,
];

try {
    $conn->beginTransaction();
    $img = $_FILES[IMG_FILE_NAME];
    if ($img['size']) {
        $menuData['img_file_id'] = FileService::saveMenuFile($img);
    }
    $menuRepo->update($menuData);
    $conn->commit();
} catch (\Exception $e) {
    $conn->rollBack();
    AdminRouter::errorPage($e);
}

FlashUtils::success("Menu edited successfully");
AdminRouter::success(AdminRouter::menu);


