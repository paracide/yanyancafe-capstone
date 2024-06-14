<?php

namespace App\admin\api;

global $menuRepo;
use App\tools\AdminRouter;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Validator;

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
$path = $_FILES['picture']['tmp_name'];
$validator->checkEmpty($path, "picture");
$validator->checkNum($price, "price");
$validator->checkNum($size, "size");
$validator->checkNum($discount, "discount");
$validator->checkNum($calorie_count, "$calorie_count");

if(!empty($path)){
    $imageInfo = getimagesize($path);
}

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

$availability = $_POST['availability'] === 'on';
$is_take_away = $_POST['is_take_away'] === 'on';
FlashUtils::success("Delete Menu Successfully");
AdminRouter::success(AdminRouter::menu);
