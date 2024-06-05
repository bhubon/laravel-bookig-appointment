<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
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
        // Get three random users with role 'staff'
        $staffUsers = User::where('role', 'staff')->inRandomOrder()->limit(3)->get();

        return [
            'staff_id'   => $staffUsers->random()->id,
            'service_id' => Service::inRandomOrder()->first()->id,
            'date'       => $this->faker->dateTimeBetween('tomorrow', '+30 days')->format('Y-m-d'),
        ];
    }
}
