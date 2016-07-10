<?php
namespace App\Services;
use App\Models\YearProject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Ramsey\Uuid\Uuid;

use App\Services\UserService;


class YearProjectService extends Service{

    public function getAll(){
       return YearProject::all();
    }

}