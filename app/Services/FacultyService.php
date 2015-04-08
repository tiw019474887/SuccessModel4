<?php
namespace App\Services;
use App\Models\Faculty;

/**
 * Created by PhpStorm.
 * User: chaow
 * Date: 4/7/2015
 * Time: 3:03 PM
 */

class FacultyService extends Service{

    public function getAll(){
        return Faculty::all();
    }

    public function get($id){
        $faculty = Faculty::find($id);
        return $faculty;
    }

    public function store(array $input){
        $faculty = new Faculty();
        $faculty->fill($input);
        $faculty->save();
        return $faculty;
    }
    public function save(array $input){
        if (array_has($input,'id')){
            $id = $input['id'];
            /* @var Faculty $faculty */
            $faculty = Faculty::find($id);
            $faculty->fill($input);
            $faculty->save();
            return $faculty;
        }else {
            return $this->store($input);
        }
    }

    public function create()
    {
        return new Faculty();
    }

    public function delete($id){
        return Faculty::find($id)->delete();
    }

}