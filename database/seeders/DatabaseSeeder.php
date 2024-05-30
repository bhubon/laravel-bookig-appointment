<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {


        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'role' => 'staff',
        ]);

        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'role' => 'customer',
        ]);

        User::factory(7)->create();


        $staff = Staff::factory(10)->create();
        $services = Service::factory(10)->create();
        Customer::factory(10)->create();
        Schedule::factory(10)->create();
        Appointment::factory(10)->create();
        Payment::factory(10)->create();

        $staff->each(function ($staffMember) use ($services) {
            $staffMember->services()->attach(
                $services->random(rand(1, 10))->pluck('id')->toArray()
            );
        });
    }
}
