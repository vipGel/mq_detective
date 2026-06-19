<?php

namespace Database\Seeders;

use App\Models\MQInstanceState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MQInstanceStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MQInstanceState::create(['name' => 'started']);
        MQInstanceState::create(['name' => 'paused']);
        MQInstanceState::create(['name' => 'ended']);
        // maybe more

    }
}
