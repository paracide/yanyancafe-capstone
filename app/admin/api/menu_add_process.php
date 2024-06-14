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
$path = $_FILES['img']['tmp_name'];
$validator->checkEmpty($path, "Image");
$validator->checkNum($price, "Price");
$validator->checkNum($size, "Size");
$validator->checkNum($discount, "Discount");
$validator->checkNum($calorie_count, "Calorie Count");

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
