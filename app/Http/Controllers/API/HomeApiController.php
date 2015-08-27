<?php namespace App\Http\Controllers\API;

use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Services\UserService;
use Illuminate\Http\Request;
use \Input;

class HomeApiController extends Controller {


    public function search(){
        return $this->HomeService->search(Input::all());
    }

}
