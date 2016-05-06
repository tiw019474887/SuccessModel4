<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Area;
use App\Services\AreaService;
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


	public function store()
	{
		return $this->areaService->store(Input::all());
	}

	public function show($id)
	{
        return $this->areaService->get($id);
	}

	public function update($id)
	{
        return $this->areaService->update(Input::all());
	}

	public function destroy($id)
	{
		return [$this->areaService->delete($id)];
	}


}
