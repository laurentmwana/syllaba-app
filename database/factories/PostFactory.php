<?php

namespace Database\Factories;

use App\Enums\RoleUserEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->text(200),
            'content' => $this->faker->text(200),
            'image' => $this->faker->imageUrl(),
            'user_id' => User::where('role', '=', RoleUserEnum::ADMIN->value)->first()->id
        ];
    }
}
