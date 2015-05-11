<?php
namespace App\Http\Controllers\Guest;
/**
 * Created by PhpStorm.
 * User: chaow
 * Date: 4/24/2015
 * Time: 5:12 PM
 */

use App\Http\Controllers\Controller;

class RegisterController extends Controller {

    public function registerPage(){
        return view('guest.register');
    }

}