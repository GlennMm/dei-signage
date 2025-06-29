<?php
// database/seeders/PortfolioSeeder.php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolio = [
            [
                'title' => 'ZimBank Corporate Headquarters Rebrand',
                'slug' => 'zimbank-corporate-headquarters-rebrand',
                'description' => 'A comprehensive signage and branding project for ZimBank\'s headquarters building. We created custom 3D illuminated signs for their main entrance, along with interior signage and directional systems throughout their office spaces.',
                'short_description' => 'Complete corporate headquarters signage and branding solution.',
                'category' => 'illuminated',
                'client_name' => 'ZimBank Financial Services',
                'project_location' => 'Harare, Zimbabwe',
                'completion_date' => '2023-04-15',
                'services_provided' => [
                    ['service' => '3D Illuminated Entrance Signs'],
                    ['service' => 'Interior Office Branding'],
                    ['service' => 'Directional Wayfinding Systems'],
                    ['service' => 'Reception Area Signage']
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Meikles Hotel Luxury Signage',
                'slug' => 'meikles-hotel-luxury-signage',
                'description' => 'Premium hotel signage project featuring elegant illuminated entrance signs and comprehensive interior wayfinding for Zimbabwe\'s most prestigious hotel.',
                'short_description' => 'Luxury hotel signage with illuminated entrance and interior wayfinding.',
                'category' => 'illuminated',
                'client_name' => 'Meikles Hotel',
                'project_location' => 'Harare, Zimbabwe',
                'completion_date' => '2022-11-30',
                'services_provided' => [
                    ['service' => 'Illuminated Hotel Entrance'],
                    ['service' => 'Restaurant Signage'],
                    ['service' => 'Room Number Systems'],
                    ['service' => 'Event Space Signage']
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Borrowdale Estate Gate Signs',
                'slug' => 'borrowdale-estate-gate-signs',
                'description' => 'Custom illuminated gate signs for an upscale residential estate, featuring elegant design and premium materials for enhanced security and curb appeal.',
                'short_description' => 'Elegant illuminated gate signs for luxury residential estate.',
                'category' => 'gate',
                'client_name' => 'Borrowdale Estate',
                'project_location' => 'Borrowdale, Harare',
                'completion_date' => '2023-02-20',
                'services_provided' => [
                    ['service' => 'Illuminated Gate Signs'],
                    ['service' => 'Property Number Signs'],
                    ['service' => 'Directional Estate Signage']
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'TechHub Office Branding',
                'slug' => 'techhub-office-branding',
                'description' => 'Modern office branding solution for Zimbabwe\'s leading technology incubator, featuring contemporary design elements and innovative materials.',
                'short_description' => 'Contemporary office branding for technology innovation center.',
                'category' => 'office',
                'client_name' => 'TechHub Zimbabwe',
                'project_location' => 'Harare, Zimbabwe',
                'completion_date' => '2023-06-10',
                'services_provided' => [
                    ['service' => '3D Logo Installation'],
                    ['service' => 'Office Interior Branding'],
                    ['service' => 'Meeting Room Signs'],
                    ['service' => 'Innovation Lab Signage']
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Medical Centre Wayfinding System',
                'slug' => 'medical-centre-wayfinding-system',
                'description' => 'Comprehensive wayfinding and signage system for a modern medical facility, ensuring easy navigation for patients and visitors.',
                'short_description' => 'Complete medical facility wayfinding and signage system.',
                'category' => 'informative',
                'client_name' => 'Borrowdale Medical Centre',
                'project_location' => 'Borrowdale, Harare',
                'completion_date' => '2022-09-15',
                'services_provided' => [
                    ['service' => 'Exterior Building Signs'],
                    ['service' => 'Interior Wayfinding'],
                    ['service' => 'Department Signs'],
                    ['service' => 'Safety & Regulatory Signage']
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Trade Show Exhibition Stand',
                'slug' => 'trade-show-exhibition-stand',
                'description' => 'Complete exhibition stand design and signage for the Zimbabwe International Trade Fair, featuring modular displays and eye-catching graphics.',
                'short_description' => 'Professional trade show exhibition stand with custom signage.',
                'category' => 'exhibition',
                'client_name' => 'Various Corporate Clients',
                'project_location' => 'Bulawayo, Zimbabwe',
                'completion_date' => '2023-08-25',
                'services_provided' => [
                    ['service' => 'Pull-up Banner Displays'],
                    ['service' => 'Modular Exhibition Stands'],
                    ['service' => 'Promotional Signage'],
                    ['service' => 'Digital Display Integration']
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($portfolio as $project) {
            Portfolio::create($project);
        }
    }
}