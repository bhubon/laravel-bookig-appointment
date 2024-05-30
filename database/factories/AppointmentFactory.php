<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Schedule;
use App\Models\Staff;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'customer_id'      => Customer::inRandomOrder()->first()->id,
            'staff_id'         => Staff::inRandomOrder()->first()->id,
            'service_id'       => Service::inRandomOrder()->first()->id,
            'amount'           => fake()->randomFloat(2, 10, 1000),
            'appointment_time' => fake()->dateTime(),
            'status'           => fake()->randomElement(['pending', 'confirmed', 'completed', 'canceled']),
        ];
    }
}
