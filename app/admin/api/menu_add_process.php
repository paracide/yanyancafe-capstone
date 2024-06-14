<?php

namespace App\admin\api;

global
$menuRepo;
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
$validator->checkNum($price, "price");
$validator->checkImg(IMG_FILE_NAME);
$validator->checkNum($size, "size");
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
    AdminRouter::fail(AdminRouter::menu_add);
}

$picture       = $_FILES[IMG_FILE_NAME];
$fileExtension = pathinfo($picture['name'], PATHINFO_EXTENSION);
$fileName      = pathinfo($picture['name'], PATHINFO_FILENAME);
$newFileName   = $fileName . time() . '.' . $fileExtension;
$targetPath    = __DIR__ . '/../../../public/images/menu/' . $newFileName;
move_uploaded_file($picture["tmp_name"], $targetPath);

$availability = $_POST['availability'] === 'on';
$is_take_away = $_POST['is_take_away'] === 'on';
FlashUtils::success("Delete Menu Successfully");
AdminRouter::success(AdminRouter::menu);
