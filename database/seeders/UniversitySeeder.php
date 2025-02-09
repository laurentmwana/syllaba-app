<?php

namespace Database\Seeders;

use App\Enums\RoleUserEnum;
use App\Enums\YearAcademicEnum;
use App\Models\Level;
use App\Models\Option;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Department;
use App\Models\User;
use App\Models\YearAcademic;
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

        YearAcademic::create(['start' => '2025', 'end' => '2026', 'status' => YearAcademicEnum::OPEN->value]);

        YearAcademic::create(['start' => '2024', 'end' => '2025', 'status' => YearAcademicEnum::CLOSED->value]);

        $users = User::where('role', '!=', RoleUserEnum::ADMIN->value)->get();

        foreach ($users as $user) {
            $student = Student::factory()->create();

            $user->update(['student_id' => $student->id]);
        }
    }
}
