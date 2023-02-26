<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(500)->create();
        \App\Models\Topup::factory(200000)->state(new Sequence(
            // fn ($sequence) => ['user_id' => \App\Models\User::all()->random()],
            fn ($sequence) => ['user_id' => rand(1, 500)],
        ))->create();
    }
}
