<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Enums\RoleUserEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => RoleUserEnum::ADMIN->value,
        ]);

        Category::factory(10)->create();

        Post::factory(100)
            ->create(['user_id' => $user->id])
            ->each(function (Post $post) {
                $post->categories()->sync(Category::all()->random()->id);
            });

    }
}
