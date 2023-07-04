<?php

namespace Database\Seeders;

use App\Models\Settings;
use Database\Factories\SettingsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::factory()->create();
    }
}
