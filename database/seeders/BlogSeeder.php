<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::factory(5)->create();

        Post::factory(20)
            ->create()
            ->each(function (Post $post) {
                $post->categories()->sync(Category::all()->random()->id);
            });
    }
}
