<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeAttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id'=> 1,
            'date'=>'2022-1-8',
            'status'=> 'reason',
            'create_user_id'=> 1,
        ];
    }
}
