<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;

class UserTypeSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */


	public function run()
	{

        $adminType = new \App\Models\UserType();
        $adminType->key="admin";
        $adminType->name="Administrator";
        $adminType->description="Administrator";
        $adminType->save();

        $facultyType = new \App\Models\UserType();
        $facultyType->key = "faculty";
        $facultyType->name = "Faculty Officer";
        $facultyType->description = "Faculty Officer";
        $facultyType->save();

        $universityType = new \App\Models\UserType();
        $universityType->key = "university";
        $universityType->name = "University Officer";
        $universityType->description = "University Officer";
        $universityType->save();

        $researcherType = new \App\Models\UserType();
        $researcherType->key = "researcher";
        $researcherType->name = "Researcher";
        $researcherType->description = "Researcher";
        $researcherType->save();

        $userType = new \App\Models\UserType();
        $userType->key = "user";
        $userType->name = "Normal UserRequest";
        $userType->description = "Normal UserRequest";
        $userType->save();


    }

}
