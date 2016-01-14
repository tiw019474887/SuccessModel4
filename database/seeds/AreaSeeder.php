

<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

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
            ["อำเภอเมือง",19.1664466,99.90198880000001,9],
            ["อำเภอแม่ใจ",19.375557200000003,99.7901781,9],
            ["อำเภอดอกคำใต้",19.150464,100.0359661,9],
            ["อำเภอภูกามยาว",19.318769400000008,99.9688636,9],
            ["อำเภอภูซาง",19.625313999999975,100.3722477,9],
            ["อำเภอเชียงคำ",19.498743700000006,100.3251564,9],
            ["อำเภอเชียงม่วน",18.947594699999996,100.3048897,9],
            ["อำเภอจุน",19.427696400000016,100.12551639999998,9],
            ["อำเภอปง",19.149037399999983,100.2745494,9]
        ];

        foreach($areas as $area){
            $a = new Area();
            $a->name_th = $area[0];
            $a->lat=$area[1];
            $a->lon=$area[2];
            $a->zoom=$area[3];
            $a->save();
        }


    }

}

