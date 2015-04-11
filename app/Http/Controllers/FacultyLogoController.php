<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Logo;
use App\Services\FacultyService;
use Illuminate\Http\Request;

class FacultyLogoController extends Controller {


    public function __construct(FacultyService $facultyService){
        $this->facultyService = $facultyService;
    }

	/**
	 * Display a listing of the resource.
	 *
     * @param  int  $facultyId
	 * @return Response
	 */
	public function index($facultyId)
	{
        /* @var Faculty $faculty */
        $faculty = $this->facultyService->get($facultyId);
        $logo = $faculty->logo()->orderBy('created_at','desc')->first();

        return $logo;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($facultyId)
	{
		return $this->facultyService->saveLogo($facultyId, \Input::instance());
	}

	public function destroy($id)
	{
		//
	}

}
