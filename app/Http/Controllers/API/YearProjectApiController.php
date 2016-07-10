<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\YearProject;
use App\Services\YearProjectService;
use Illuminate\Http\Request;
use \Input;

class YearProjectApiController extends Controller {

    public function __construct(YearProjectService $yearProjectService){
        $this->yearProjectService = $yearProjectService;
    }

	public function index(){
		return $this->yearProjectService->getAll();
	}

}
