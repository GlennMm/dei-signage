<?php
// database/seeders/ClientSeeder.php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'name' => 'ZimBank Financial Services',
                'slug' => 'zimbank-financial-services',
                'description' => 'Leading financial institution requiring comprehensive office branding and signage solutions for their headquarters and branch locations.',
                'industry' => 'finance',
                'website' => 'https://zimbank.co.zw',
                'services_provided' => [
                    ['service' => '3D Illuminated Signs'],
                    ['service' => 'Office Branding'],
                    ['service' => 'Directional Signage'],
                    ['service' => 'Reception Area Branding']
                ],
                'partnership_date' => '2020-03-15',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Meikles Hotel',
                'slug' => 'meikles-hotel',
                'description' => 'Premium hospitality brand requiring elegant signage solutions for their luxury hotel property in Harare.',
                'industry' => 'hospitality',
                'website' => 'https://meikles.com',
                'services_provided' => [
                    ['service' => 'Illuminated Entrance Signs'],
                    ['service' => 'Interior Wayfinding'],
                    ['service' => 'Room Number Signs'],
                    ['service' => 'Restaurant Signage']
                ],
                'partnership_date' => '2019-08-22',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'TechHub Zimbabwe',
                'slug' => 'techhub-zimbabwe',
                'description' => 'Innovation center and technology incubator needing modern signage to reflect their cutting-edge approach.',
                'industry' => 'technology',
                'website' => 'https://techhub.co.zw',
                'services_provided' => [
                    ['service' => '3D Logo Signage'],
                    ['service' => 'Office Branding'],
                    ['service' => 'Digital Display Integration']
                ],
                'partnership_date' => '2021-06-10',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Borrowdale Medical Centre',
                'slug' => 'borrowdale-medical-centre',
                'description' => 'Private healthcare facility requiring professional medical signage and wayfinding systems.',
                'industry' => 'healthcare',
                'services_provided' => [
                    ['service' => 'Exterior Building Signs'],
                    ['service' => 'Interior Wayfinding'],
                    ['service' => 'Department Identification'],
                    ['service' => 'Safety Signage']
                ],
                'partnership_date' => '2020-11-05',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Eastgate Shopping Centre',
                'slug' => 'eastgate-shopping-centre',
                'description' => 'Major retail complex requiring comprehensive signage solutions for the entire shopping center.',
                'industry' => 'retail',
                'services_provided' => [
                    ['service' => 'Exterior Mall Signage'],
                    ['service' => 'Store Directory Systems'],
                    ['service' => 'Parking Signage'],
                    ['service' => 'Promotional Display Systems']
                ],
                'partnership_date' => '2018-04-12',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'University of Zimbabwe',
                'slug' => 'university-of-zimbabwe',
                'description' => 'Leading educational institution requiring campus-wide signage and wayfinding solutions.',
                'industry' => 'education',
                'website' => 'https://uz.ac.zw',
                'services_provided' => [
                    ['service' => 'Campus Wayfinding'],
                    ['service' => 'Building Identification'],
                    ['service' => 'Educational Displays'],
                    ['service' => 'Safety and Regulatory Signs']
                ],
                'partnership_date' => '2019-01-20',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}