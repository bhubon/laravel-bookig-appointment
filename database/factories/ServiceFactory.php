<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

  /**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory {
      /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'name'        => fake()->word(),
            'description' => fake()->paragraph(),
            'duration'    => fake()->randomElement(['60 minutes', '30 minutes', '15 minutes']),
            'price'       => fake()->randomFloat(2, 10, 100)
        ];
    }
}
