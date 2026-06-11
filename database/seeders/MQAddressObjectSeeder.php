<?php

namespace Database\Seeders;

use App\Models\MQAddressObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MQAddressObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MQAddressObject::create(['name' => 'individuals']);
        MQAddressObject::create(['name' => 'police']);
        // and more
    }
}
