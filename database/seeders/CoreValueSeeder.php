<?php
// database/seeders/CoreValueSeeder.php

namespace Database\Seeders;

use App\Models\CoreValue;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'title' => 'Efficiency',
                'description' => 'We believe in offering quality products at high speed and at low cost, optimizing our processes to deliver maximum value to our clients while maintaining exceptional standards.',
                'icon' => '⚡',
                'color' => '#00796b',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Simplicity',
                'description' => 'We offer directness of expression to our clients, making complex ideas accessible and ensuring clear communication throughout the design and production process.',
                'icon' => '🎯',
                'color' => '#4caf50',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Flexibility',
                'description' => 'We make changes quickly and efficiently in response to specific situations or needs, adapting our approach to meet our clients\' evolving requirements and market demands.',
                'icon' => '🔄',
                'color' => '#ffc107',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($values as $value) {
            CoreValue::create($value);
        }
    }
}