<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(1, 2)),
            'description' => collect($this->faker->paragraphs(1))->map(fn($p) => "<p>$p</p>")->implode(''),
            'author_id' => mt_rand(1, 6),
            'category_id' => mt_rand(1, 3)
        ];
    }
}