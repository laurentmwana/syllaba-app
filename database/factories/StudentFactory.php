<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Helpers\TokenGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(GenderEnum::cases());

        return [
            'name' => $this->faker->name,
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'gender' => $gender->value,
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'token' => TokenGenerator::alpha(14),
        ];
    }
}
