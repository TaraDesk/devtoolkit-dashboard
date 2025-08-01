<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'summary' => fake()->sentence(7),
            'description' => fake()->paragraph,
            'link' => fake()->url,
            'icon_url' => fake()->url,
            'category_id' => Category::factory()
        ];
    }
}
