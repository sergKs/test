<?php

namespace app\helpers;

use Yii;
use yii\helpers\Json;
use yii\web\UploadedFile;

class UploaderFile
{
    /**
     * @param $model
     * @param $attr
     * @return string
     */
    public static function uploadImage($model, $attr)
    {
        $files = UploadedFile::getInstances($model, $attr);

        $arrayNames = [];

        foreach ($files as $file) {
            $imgName = $file->baseName . '.' . uniqid() . '.' . $file->extension;
            $file->saveAs('uploads/' . $imgName);
            $arrayNames[] = $imgName;
        }

        return Json::encode($arrayNames);
    }

    public static function deleteImage($model)
    {
        $images = Json::decode($model->img);

        foreach ($images as $image) {
            $imgPath = dirname(__DIR__) . '/web/uploads/' . $image;

            unlink($imgPath);
        }
    }
}