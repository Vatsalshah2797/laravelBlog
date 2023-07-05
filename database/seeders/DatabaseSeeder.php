<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //\App\Models\User::factory(10)->create();

        $this->call(PermissionSeeder::class);

        $this->call(UserSeeder::class);

        // \App\Models\Post::factory()->create([
        //     'title' => 'Developing Extraordinary Faith',
        //     'description' => 'In 2013, our friends Scott and Jen Obremski felt led to start a new church in Kansas City, Missouri.',
        //     ''
        // ]);
    }
}
