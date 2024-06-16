<?php

namespace App\service\impl;

class FileSvr
{

    /**
     * @throws \Exception
     */
    public static function saveMenuFile(array $img): int
    {
        global $fileRepo;
        $imgExtension = pathinfo($img['name'], PATHINFO_EXTENSION);
        $imgName      = pathinfo($img['name'], PATHINFO_FILENAME);
        $newImgName   = $imgName . time() . '.' . $imgExtension;
        $relativePath = "/images/menu/$newImgName";
        $targetPath   = __DIR__ . '/../../../public/' . $relativePath;
        move_uploaded_file($img["tmp_name"], $targetPath);

        return $fileRepo->addByPath(
          $targetPath,
          $relativePath
        );
    }

}
