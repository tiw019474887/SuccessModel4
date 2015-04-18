<?php namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use \Auth;
use Illuminate\Http\Response;
use \Input;
class AuthApiController extends Controller {

    public function authenticate()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return Auth::user();
        }else {
            return \Response::json([
                "email" => $email,
                "password" =>$password,
                "error" => "E-mail or Password is invalid"
            ],500);
        }
    }

    public function unAuthenticate(){
        Auth::logout();
        return ["true"];
    }

}
