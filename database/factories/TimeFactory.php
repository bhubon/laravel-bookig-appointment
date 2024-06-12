<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Time;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeFactory extends Factory
{
    protected $model = Time::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $times = [
            '8am', '8:30am', '9am', '9:30am', '10am', '10:30am', '11am', '11:30am',
            '12pm', '12:30pm', '1pm', '1:30pm', '2pm', '2:30pm', '3pm', '3:30pm',
            '4pm', '4:30pm', '5pm'
        ];

        return [
            'schedule_id' => Schedule::inRandomOrder()->first()->id,
            'time' => $this->faker->randomElement($times),
            'status' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
