<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $category = Category::first(); // get the first category

        Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id' => $category->id, // set required category_id
        ]);
    }
}

