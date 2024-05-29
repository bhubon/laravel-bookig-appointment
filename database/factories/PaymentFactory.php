<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appointment_id'=> Appointment::inRandomOrder()->first()->id,
            'amount'=> Appointment::inRandomOrder()->first()->amount,
            'payment_method'=> fake()->randomElement(['cod', 'sslcommerze']),
            'transaction_id' => fake()->unique()->bothify('???###??##'),
            'status'=> fake()->randomElement(['pending', 'complete', 'failed']),
        ];
    }
}
