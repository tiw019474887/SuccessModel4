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
 * User: chaow
 * Date: 4/7/2015
 * Time: 3:03 PM
 */

class UserService extends Service{

    public function getAll(){
        return User::with(['userType'])->get();
    }

    public function get($id){
        $user = User::with(['userType'])->find($id);
        return $user;
    }

    private function linkToUserType(User $user, array $input){

        if (isset($input['user_type'])){
            $id = $input['user_type']['id'];
            $userType = UserType::find($id);
            $user->userType()->associate($userType);
        }else {
            $userType = UserType::where('key','=','user')->first();
            $user->userType()->associate($userType)->save();
        }
        return $user;
    }

    public function store(array $input){

        $user = new User();
        $user->fill($input);
        $user->save();
        $this->linkToUserType($user,$input);
        return $user;

    }
    public function save(array $input){
        if (array_has($input,'id')){
            $id = $input['id'];
            /* @var User $user */
            $user = User::find($id);
            $user->fill($input);
            $user->save();
            $this->linkToUserType($user,$input);
            return $user;
        }else {
            return $this->store($input);
        }
    }

    public function create()
    {
        return new User();
    }

    public function delete($id){
        return [User::find($id)->delete()];
    }

    public function saveLogo($userId,Request $input){
        /* @var User $user */
        $user = $this->get($userId);
        $uuid = Uuid::uuid4();
        $storage_path= "app/users/$userId/logo/";
        $destination_path = storage_path($storage_path);
        $input->file('file')->move($destination_path,$uuid);

        $logo = new Logo();
        $logo->url = "/img/users/$userId/logo/$uuid";
        $user->logo()->save($logo);
        return $logo;
    }

}
