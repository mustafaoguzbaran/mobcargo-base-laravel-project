<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory\App\Models\Cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "verici_sube" => fake()->name,
            "alici_sube" => fake()->name,
            "gonderilen_il" => fake()->name,
            "gonderilen_ilce" => fake()->name,
            "tam_adres" => fake()->text,
            "kargo_durum" => fake()->name
        ];
    }
}
