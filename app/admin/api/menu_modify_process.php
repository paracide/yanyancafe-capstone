<?php

namespace App\admin\api;

global $menuRepo;
use App\tools\AdminRouter;
use App\tools\FlashUtils;
use App\tools\Preconditions;

Preconditions::checkPostRequest();


FlashUtils::success("Delete Menu Successfully");
AdminRouter::success(AdminRouter::menu);
