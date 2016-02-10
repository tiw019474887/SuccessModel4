<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;

class ProjectSeeder extends Seeder
{

    public function run()
    {
        $years = [
            2557,
            2558,
            2559,
            2560

        ];

        foreach($years as $year){
            $f = new Project();
            $f->yearProject = $year;
            $f->save();
        }
    }
}
