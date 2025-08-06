<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Post::factory(2)->create();

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
        ]);

        $categories = ['Lifestyle', 'Health', 'Travel', 'Education', 'Personal Growth'];
        
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        $tags = ['Laravel', 'PHP', 'Mindfulness', 'Remote Work', 'Fitness', 'Self-Care', 'Design'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }

}
