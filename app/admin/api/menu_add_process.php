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
//check form error
AdminRouter::checkFormError(
  MenuSvr::validateModifyForm(true),
  AdminRouter::menu_add
);

//prepare data
$data = MenuSvr::prepareData();

//save menu
$menuRepo->newMenu($data, $_FILES[Constant::MENU_FORM_FILE]);
FlashUtils::success("Menu added successfully");
AdminRouter::success(AdminRouter::menu);


