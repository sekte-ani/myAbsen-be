<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_masuk' => fake()->date,
            'jam_masuk' => fake()->time,
            'tanggal_keluar' => fake()->date,
            'jam_keluar' => fake()->time,
            'lat-in'=>fake()->latitude,
            'long-in' => fake()->longitude,
            'lat-out'=>fake()->latitude,
            'long-out' => fake()->longitude,
            'status' => fake()->randomElement(['0','1']),
            'user_id'=> rand(2,4)
        ];
    }
}
