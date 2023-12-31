<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultUserSeeder::class);

        \App\Models\User::factory(15)->create();
        \App\Models\Author::factory(5)->create();
        \App\Models\Category::factory(8)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\CategoryPost::factory(10)->create();
        \App\Models\Comment::factory(20)->create();
    }
}
