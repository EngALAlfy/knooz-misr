<?php

namespace Database\Seeders;

use App\Models\EmployeeAttendance;
use Illuminate\Database\Seeder;

class EmployeeAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeAttendance::factory(1)->create();

    }
}
