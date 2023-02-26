<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => User::factory(),
            'amount'      => $this->faker->numberBetween(20, 1000),
            'created_at'  => Carbon::now()->subDay(1),
            'updated_at'  => Carbon::now()->subDay(1),
        ];
    }
}
