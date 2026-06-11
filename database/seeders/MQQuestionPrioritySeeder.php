<?php

namespace Database\Seeders;

use App\Models\MQQuestionPriority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MQQuestionPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MQQuestionPriority::create(['name' => 'main questions']);
        MQQuestionPriority::create(['name' => 'extra questions']);
    }
}
