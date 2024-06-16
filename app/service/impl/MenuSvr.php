<?php

namespace App\service\impl;

use App\constant\Constant;
use App\tools\Validator;

/**
 * MenuSvr
 */
class MenuSvr
{

    /**
     * Validate menu form for add or update
     *
     * @param bool|null $isAdd
     *
     * @return array errors
     */
    public static function validateModifyForm(?bool $isAdd = false): array
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
        $validator->checkNum($discount, "discount", 0, 99);
        $validator->checkNum($calorie_count, "$calorie_count", 0, 9999);
        if ($isAdd) {
            $validator->checkImg(Constant::MENU_FORM_FILE);
        }

        //error go back to register
        return $validator->getError();
    }

    /**
     * Prepare data for menu add or update
     *
     * @return array
     */
    public static function prepareData(): array
    {
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
        if ( ! empty($_POST['id'])) {
            $arr['id'] = $_POST['id'];
        }

        return $arr;
    }

}
