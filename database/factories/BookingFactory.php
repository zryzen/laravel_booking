<?php

namespace Database\Factories;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // should verify same user does not book the same trip twice
        return [
            'user_id' => $this->faker->numberBetween(1,User::all()->count()),
            'trip_id' => $this->faker->numberBetween(1,Trip::all()->count())

            // 'user_id' =>  $this->faker->numberBetween(1,10),
            // 'trip_id' =>  $this->faker->numberBetween(1,10),
        ];
    }
}
