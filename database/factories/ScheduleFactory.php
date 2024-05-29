<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

  /**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\schedule>
 */
class ScheduleFactory extends Factory
{
      /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'staff_id'   => Staff::inRandomOrder()->first()->id,
            'service_id' =>  Service::inRandomOrder()->first()->id,
            'time'       => fake()->time(),
            'date'       => fake()->date(),
        ];
    }
}
