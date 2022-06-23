<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'id_familia' => 1,
            'id_donor' => $this->faker->numberBetween(1, 20),
            'id_owner' => $this->faker->numberBetween(1, 20),
            // 'nis' => $this->faker->numberBetween(00000000, 88888888),
            // 'photo' => 'avatar/' . strtolower(substr($this->faker->name(), 0, 1)) . '.png'
        ];
    }
}
