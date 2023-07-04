<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settings>
 */
class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "logo" => "MOBCARGO",
            "main_header" => "MOB Cargo Hız ve Memnuniyet Bizim İşimiz!",
            "main_info_title" => "MOB CARGO Kimdir?",
            "main_info_content" => "2023 yılında faaliyete giren MOBCARGO, sizlere daha iyi, çevreci ve HIZLI teslimat amacıyla kuruldu. Yönetim kurulu başkanımız Mustafa Oğuz BARAN'ın sizleri çok sevdiğini de belirtmek istiyoruz."
        ];
    }
}
