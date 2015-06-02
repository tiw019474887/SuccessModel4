<?php
/**
 * Created by PhpStorm.
 * User: chaow
 * Date: 5/19/2015
 * Time: 9:57 AM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Faculty;
use \DB;
class ChartApiController extends  Controller{

    public function facultyProjectChart(){



        $chart = [];
        $chart['labels'] = [];
        $chart['series'] = ["จำนวนโครงการ"];
        $chart['data'] = [];

        $faculties = Faculty::with(['projects'])->get();
        $seriesA = [];
        foreach($faculties as $f){
            array_push($chart['labels'],$f->name_th);
            array_push($seriesA,$f->projects->count());
        }
        array_push($chart['data'],$seriesA);

        return $chart;


    }


}