<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $adminType = new \App\Models\Role();
        $adminType->key = "admin";
        $adminType->name = "Administrator";
        $adminType->description = "Administrator";
        $adminType->save();

        $facultyType = new \App\Models\Role();
        $facultyType->key = "faculty";
        $facultyType->name = "Faculty Officer";
        $facultyType->description = "Faculty Officer";
        $facultyType->save();

        $universityType = new \App\Models\Role();
        $universityType->key = "university";
        $universityType->name = "University Officer";
        $universityType->description = "University Officer";
        $universityType->save();

        $researcherType = new \App\Models\Role();
        $researcherType->key = "researcher";
        $researcherType->name = "Researcher";
        $researcherType->description = "Researcher";
        $researcherType->save();

        $usersType = new \App\Models\Role();
        $usersType->key = "users";
        $usersType->name = "Usersview";
        $usersType->description = "Usersview";
        $usersType->save();


    }

}
