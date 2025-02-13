<?php



namespace App\Services\DataValues;

use App\Enums\EventTypeEnum;
use App\Models\Level;
use App\Enums\GenderEnum;
use App\Models\Course;
use App\Models\CourseDocument;
use App\Models\Department;
use App\Models\Document;
use App\Models\Faculty;
use App\Models\Professor;
use App\Models\Student;
use App\Models\YearAcademic;
use Illuminate\Support\Collection;

final class DataValueFormatter
{

    public static function getGenders(): Collection
    {
        return (new Collection(
            array_map(function (GenderEnum $enum) {
                return (new DataOptionSelect())
                    ->setId($enum->value)
                    ->setName($enum->value);
            }, GenderEnum::cases())
        ));
    }



    public static function getTypeEvents(): Collection
    {
        return (new Collection(
            array_map(function (EventTypeEnum $enum) {
                return (new DataOptionSelect())
                    ->setId($enum->value)
                    ->setName($enum->value);
            }, EventTypeEnum::cases())
        ));
    }

    public static function getLevels(): Collection
    {
        $levels = Level::with(['option'])
            ->get(['id', 'name', 'option_id']);


        $collection = new Collection();


        foreach ($levels as $level) {
            $collection->add(
                (new DataOptionSelect())
                    ->setId($level->id)
                    ->setName(
                        sprintf("%s - %s", $level->name, $level->option->alias)
                    )
            );
        }


        return $collection;
    }


    public static function getYearAcademics(): Collection
    {
        $years = YearAcademic::orderByDesc('status')
            ->get(['id', 'start', 'end', 'status']);

        $collection = new Collection();


        foreach ($years as $year) {
            $collection->add(
                (new DataOptionSelect())
                    ->setId($year->id)
                    ->setName(
                        sprintf("%s - %s [%s]", $year->start, $year->end, $year->status)
                    )
            );
        }


        return $collection;
    }

    public static function getFaculties(): Collection
    {
        return Faculty::orderByDesc('updated_at')
            ->get(['id', 'name']);
    }


    public static function getStudents(): Collection
    {
        $students = Student::all(['id', 'name', 'firstname', 'gender']);

        $collection = new Collection();

        foreach ($students as $student) {
            $collection->add(
                (new DataOptionSelect())
                    ->setId($student->id)
                    ->setName(
                        sprintf(
                            "%s - %s [%s]",
                            $student->name,
                            $student->firstname,
                            $student->gender
                        )
                    )
            );
        }

        return $collection;
    }

    public static function getDepartments(): Collection
    {
        $departments = Department::all(['id', 'alias']);

        $collection = new Collection();

        foreach ($departments as $department) {
            $collection->add(
                (new DataOptionSelect())
                    ->setId($department->id)
                    ->setName($department->alias)
            );
        }

        return $collection;
    }


    public static function getProfessors(): Collection
    {
        $professors = Professor::all(['id', 'name', 'firstname']);

        $collection = new Collection();

        foreach ($professors as $professor) {
            $collection->add(
                (new DataOptionSelect())
                    ->setId($professor->id)
                    ->setName(sprintf("%s - %s ", $professor->name, $professor->firstname))
            );
        }

        return $collection;
    }


    public static function getCourseDocuments(): Collection
    {
        $courseDocuments = CourseDocument::with(['course', 'yearAcademic'])->get();

        $collection = new Collection();

        foreach ($courseDocuments as $courseDocument) {
            $collection->add(
                (new DataOptionSelect())
                    ->setId($courseDocument->id)
                    ->setName(sprintf("%s - %s : [%s]", $courseDocument->title, $courseDocument->course->name, sprintf("%s - %s", $courseDocument->yearAcademic->start, $courseDocument->yearAcademic->end)))
            );
        }

        return $collection;
    }



    public static function getCourses(): Collection
    {
        $courses = Course::with(['levels'])->get();

        $collection = new Collection();

        foreach ($courses as $course) {
            $parseLevels = join(', ', array_map(
                fn(array $level) => $level['alias'],
                $course->levels->toArray()
            ));

            $collection->add(
                (new DataOptionSelect())
                    ->setId($course->id)
                    ->setName(sprintf("%s [%s]", $course->name, $parseLevels))
            );
        }

        return $collection;
    }
}
