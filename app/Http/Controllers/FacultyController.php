<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Faculty;
use App\Services\FacultyService;
use Illuminate\Http\Request;
use \Input;

class FacultyController extends Controller {

    public function __construct(FacultyService $facultyService){
        $this->facultyService = $facultyService;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->facultyService->getAll();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return $this->facultyService->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreFacultyPostRequest $request)
	{
		return $this->facultyService->store(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->facultyService->get($id);
	}

	/**
	 * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
	 */
	public function edit($id)
	{
        return $this->facultyService->get($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        return $this->facultyService->save(Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return [$this->facultyService->delete($id)];
	}

}
