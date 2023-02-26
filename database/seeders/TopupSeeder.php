<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Topup::factory(50000)->state(new Sequence(
            // fn ($sequence) => ['user_id' => \App\Models\User::all()->random()],
            fn ($sequence) => ['user_id' => rand(1, 500)],
        ))->create();
    }
}
