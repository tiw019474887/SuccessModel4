<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;

class AreaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $areas = [
            "อำเภอเมือง",
            "อำเภอแม่ใจ",
            "อำเภอดอกคำใต้",
            "อำเภอภูกามยาว",
            "อำเภอภูซาง",
            "อำเภอเชียงคำ",
            "อำเภอเชียงม่วน",
            "อำเภอจุน",
            "อำเภอปง",
        ];

        foreach($areas as $area){
            $f = new Area();
            $f->name_th = $area;
            $f->save();
        }


    }

}
