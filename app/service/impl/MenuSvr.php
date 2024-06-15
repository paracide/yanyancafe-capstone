<?php

namespace App\service\impl;

use App\constant\Constant;
use App\tools\Validator;

class MenuSvr
{

    public static function validateModifyForm(): array
    {
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
        $validator->checkImg(Constant::MENU_FORM_FILE);
        $validator->checkNum($discount, "discount", 0, 99);
        $validator->checkNum($calorie_count, "$calorie_count", 0, 9999);

        //error go back to register
        return $validator->getError();
    }

}
