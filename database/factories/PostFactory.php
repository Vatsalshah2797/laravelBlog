<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

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
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'image' => fake()->name(),
            'author_name' => fake()->name(),
            'author_description' => fake()->text(),
            'user_id' => User::all()->count() ? User::all()->random()->id : 0,
        ];
    }
}
