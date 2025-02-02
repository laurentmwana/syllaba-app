<?php



namespace App\Services\DataValues;

use App\Enums\EventTypeEnum;
use App\Models\Level;
use App\Enums\GenderEnum;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
}
