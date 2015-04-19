<?php
namespace App\Services;
use App\Models\User;
use App\Models\UserType;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Rhumsaa\Uuid\Uuid;

/**
 * Created by PhpStorm.
 * UserRequest: chaow
 * Date: 4/7/2015
 * Time: 3:03 PM
 */

class UserTypeService extends Service{

    public function getAll(){
        return UserType::with([])->get();
    }

    public function updateOrderable(array $input){

    }


}
