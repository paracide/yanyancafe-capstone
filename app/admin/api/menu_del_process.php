<?php

namespace App\admin\api;

global $menuRepo;
use App\tools\AdminRouter;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use Exception;

Preconditions::checkAdminPostRequest();

$menuId = $_POST['menu_id'];
try {
    $menuRepo->deleteById($menuId);
} catch (Exception $e) {
    FlashUtils::error("Failed to Delete Menu");
    AdminRouter::errorPage($e);
}
FlashUtils::success("Delete Menu Successfully");
AdminRouter::success(AdminRouter::menu);
