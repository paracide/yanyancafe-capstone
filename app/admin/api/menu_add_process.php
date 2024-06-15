<?php

namespace App\admin\api;

global
$menuRepo, $fileRepo, $conn;
use App\constant\Constant;
use App\service\impl\MenuSvr;
use App\tools\AdminRouter;
use App\tools\FlashUtils;
use App\tools\Preconditions;

Preconditions::checkPostRequest();
AdminRouter::checkFormError(
  MenuSvr::validateModifyForm(),
  AdminRouter::menu_add
);

//prepare data
$available = ($_POST['availability'] ?? '') === 'on' ? 1 : 0;
$takeaway  = ($_POST['is_take_away'] ?? '') === 'on' ? 1 : 0;
$arr       = [
  'name'          => $_POST['name'],
  'description'   => trim($_POST['description'] ?? ''),
  'category_id'   => $_POST['category_id'],
  'price'         => $_POST['price'],
  'size'          => $_POST['size'],
  'discount'      => $_POST['discount'],
  'calorie_count' => $_POST['calorie_count'],
  'availability'  => $available,
  'is_take_away'  => $takeaway,
];

$menuRepo->newMenu($arr, $_FILES[Constant::MENU_FORM_FILE]);
FlashUtils::success("Menu added successfully");
AdminRouter::success(AdminRouter::menu);


