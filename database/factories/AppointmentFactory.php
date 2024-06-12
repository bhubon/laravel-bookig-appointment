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
        $times = [
            '8am', '8:30am', '9am', '9:30am', '10am', '10:30am', '11am', '11:30am',
            '12pm', '12:30pm', '1pm', '1:30pm', '2pm', '2:30pm', '3pm', '3:30pm',
            '4pm', '4:30pm', '5pm'
        ];

        return [
            'customer_id'      => Customer::inRandomOrder()->first()->id,
            'user_id'         => Staff::inRandomOrder()->first()->id,
            'service_id'       => Service::inRandomOrder()->first()->id,
            'amount'           => $this->faker->randomFloat(2, 10, 1000),
            'appointment_date' => $this->faker->dateTimeBetween('tomorrow', '+30 days')->format('Y-m-d'),
            'appointment_time' => $this->faker->randomElement($times),
            'status'           => $this->faker->randomElement(['pending', 'confirmed', 'completed', 'canceled']),
        ];
    }
}
