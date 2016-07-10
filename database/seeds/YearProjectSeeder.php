<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\YearProject;

class YearProjectSeeder extends Seeder
{

    public function run()
    {
        $years = [
            2556,
            2557,
            2558,
            2559,
            2560,
            2561,
            2562,
            2563,
            2564,
            2565
        ];

        foreach($years as $year){
            $y = new YearProject();
            $y->yearProject = $year;
            $y->save();
        }
    }
}
