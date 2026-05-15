<?php

namespace Database\Seeders;

use App\Models\ThemeStyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThemeStyle::create([
            'primary_color' => '#3490dc',
            'secondary_color' => '#ffed4a',
            'background_color' => '#f8f9fa',
            'text_color' => '#212529',
            'font_family' => 'Arial, sans-serif',
            'button_color' => '#3490dc',
            'button_text_color' => '#ffffff',
            'link_color' => '#3490dc',
            'header_color' => '#343a40',
            'footer_color' => '#343a40',
            'logo' => null,
            'theme' => 'default',
        ]);
    }
}
