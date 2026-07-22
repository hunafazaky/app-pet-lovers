<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->firstName(),
            'category_id' => fn () => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'user_id' => fn () => User::inRandomOrder()->first()->id ?? User::factory(),
            'photo' => fake()->imageUrl(640, 480, 'animals', true),
            'age' => fake()->numberBetween(1, 150),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'condition' => fake()->randomElement(['Healthy', 'Sick']),
            'bio' => fake()->paragraph(),
        ];
    }
}
