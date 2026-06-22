<?php

namespace Database\Seeders;

use App\Models\MQGenre;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            MQGenreSeeder::class,
            MQInstanceStateSeeder::class,
            MQQuestionPrioritySeeder::class,
            MQAddressObjectSeeder::class,
        ]);
    }
}
