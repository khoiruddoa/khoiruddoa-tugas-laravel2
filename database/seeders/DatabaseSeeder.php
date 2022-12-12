<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'

        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'

        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'

        ]);
        Post::factory(30)->create();
    }
}
