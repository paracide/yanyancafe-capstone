<?php

namespace App\admin\api;

global
$menuRepo, $fileRepo, $conn;
use App\constant\Constant;
use App\service\impl\FileSvr;
use App\service\impl\MenuSvr;
use App\tools\AdminRouter;
use App\tools\FlashUtils;
use App\tools\Preconditions;

const IMG_FILE_NAME = 'picture';

Preconditions::checkPostRequest();
$menuId = $_POST['id'];
Preconditions::checkEmpty($menuRepo->getById($menuId));
AdminRouter::checkFormError(
  MenuSvr::validateModifyForm(),
  AdminRouter::menu_add,
  "&menu_id=$menuId"
);
$menuData = MenuSvr::prepareData();

try {
    $conn->beginTransaction();
    $img = $_FILES[Constant::MENU_FORM_FILE];
    if ($img['size']) {
        $menuData['img_file_id'] = FileSvr::saveMenuFile($img);
    }
    $menuRepo->update($menuData);
    $conn->commit();
} catch (\Exception $e) {
    $conn->rollBack();
    AdminRouter::errorPage($e);
}

FlashUtils::success("Menu edited successfully");
AdminRouter::success(AdminRouter::menu);


