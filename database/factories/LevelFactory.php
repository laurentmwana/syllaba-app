<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    private const ARRAY_LEVELS = [
        ['name' => 'Graduat 1', 'alias' => 'G1'],
        ['name' => 'Graduat 2', 'alias' => 'G2'],
        ['name' => 'Graduat 3', 'alias' => 'G3'],
        ['name' => 'Licence 1', 'alias' => 'L1'],
        ['name' => 'Licence 2', 'alias' => 'L2'],
        ['name' => 'Licence 1 LMD', 'alias' => 'L1 LMD'],
        ['name' => 'Licence 2 LMD', 'alias' => 'L2 LMD'],
        ['name' => 'Licence 3 LMD', 'alias' => 'L3 LMD'],
        ['name' => 'Master 1 LMD', 'alias' => 'M1 LMD'],
        ['name' => 'Master 2 LMD', 'alias' => 'M2 LMD'],
        ['name' => 'Doctorat 1 LMD', 'alias' => 'D1 LMD'],
        ['name' => 'Doctorat 2 LMD', 'alias' => 'D2 LMD'],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $level  = $this->faker->randomElement(self::ARRAY_LEVELS);

        return [
            ...$level,
            'option_id' => Option::all()->random()->id
        ];
    }
}
