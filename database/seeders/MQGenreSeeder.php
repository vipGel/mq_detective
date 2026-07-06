<?php

namespace Database\Seeders;

use App\Models\MQGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MQGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MQGenre::create(['name' => 'Нуар', 'author_id' => 1]);
//        MQGenre::create(['name' => 'cyberpunk']);
        // and more

    }
}
