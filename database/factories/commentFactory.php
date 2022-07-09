<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class commentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'commentContent' => fake()->name(),
            'user_id' => fake()->randomElement(User::all())['id'],
            'post_id' => fake()->randomElement(post::all())['id'],
        ];
    }
}
