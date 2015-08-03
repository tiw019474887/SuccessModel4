<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Area;
use App\Models\Faculty;
use App\Services\FacultyService;
use Illuminate\Http\Request;
use \Input;

class AreaApiController extends Controller {

    public function __construct(AreaService $areaService){
        $this->areaService = $areaService;
    }

	public function index()
	{

		return $this->areaService->getAll();
	}


	public function addArea()
	{
		return $this->areaService->store(Input::all());
	}

	public function get($id)
	{
        return $this->areaService->get($id);
	}

	public function update($id)
	{
        return $this->areaService->save(Input::all());
	}

	public function deleteArea($id)
	{
		return [$this->areaService->delete($id)];
	}


}
