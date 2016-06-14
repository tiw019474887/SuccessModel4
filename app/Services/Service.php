<?php
namespace App\Services;
use App\Models\Logo;

class Service {



    protected function getLogoFromModel($model){
        $logo = null;
        if ($model->logo){
            $logo = $model->logo;
        }else {
            $logo = new Logo();
        }

        return $logo;
    }

    protected function getCoverFromModel($model){
        $cover = null;
        if ($model->cover){
            $cover = $model->cover;
        }else {
            $cover = new Logo();
        }

        return $cover;
    }

}