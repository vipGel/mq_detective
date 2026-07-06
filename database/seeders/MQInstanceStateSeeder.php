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
        MQInstanceState::create(['name' => 'Не начат']);
        MQInstanceState::create(['name' => 'Начат']);
        MQInstanceState::create(['name' => 'На паузе']);
        MQInstanceState::create(['name' => 'Закончен']);
    }
}
