<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'author_user_id' => User::all()->random()->id,
            'slug' => fake()->unique()->slug(),
            'title' => fake()->sentence(),
            'thumbnail' => 'example-' . fake()->numberBetween(1, 7) .  '.jpg',
            'excerpt' => '<p>'.implode('</p><p>', fake()->paragraphs(1)).'</p>',
            'body' => '<p>'.implode('</p><p>', fake()->paragraphs(6)).'</p>',
            'views_count' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
