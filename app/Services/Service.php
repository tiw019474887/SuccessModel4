<?php
namespace App\Services;
use App\Models\Logo;

/**
 * Created by PhpStorm.
 * UserRequest: chaow
 * Date: 4/7/2015
 * Time: 3:04 PM
 */

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

}