<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Option;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faculty::factory(100)->create();
        Department::factory(300)->create();
        Option::factory(400)->create();
        Level::factory(100)->create();
        Student::factory(100)->create();
    }
}
