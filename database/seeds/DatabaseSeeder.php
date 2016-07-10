<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;



class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */


	public function run()
	{
		Model::unguard();

        $this->call("RoleSeeder");
        $this->call("AdminSeeder");
        $this->call("AreaSeeder");
        $this->call("FacultySeeder");
        $this->call("YearProjectSeeder");
        $this->call("ProjectStatusSeeder");



    }

}