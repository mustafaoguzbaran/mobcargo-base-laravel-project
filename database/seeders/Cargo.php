<?php

namespace Database\Seeders;

use Database\Factories\CargoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cargo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cargo::factory(10)->create();
    }
}
