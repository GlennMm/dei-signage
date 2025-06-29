<?php
// database/seeders/ServiceSeeder.php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => '2D Signs on Dibond',
                'slug' => '2d-signs-on-dibond',
                'category' => 'dibond',
                'short_description' => 'Tough and resilient composite aluminum signs for various applications.',
                'description' => 'Dibond signs are the toughest and most resilient metal products. They\'re very versatile and durable, making them suitable for a wide array of applications from regulatory street displays to appealing wall art pieces for exhibitions. Harnessing the strength of two robust metal layers either side of a sturdy plastic, dibond signs are more reliable and less flexible than aluminum signs.',
                'features' => [
                    ['feature' => 'Two robust metal layers with sturdy plastic core'],
                    ['feature' => 'More reliable and less flexible than aluminum signs'],
                    ['feature' => 'Weather-resistant for outdoor use'],
                    ['feature' => 'UV resistant and fade-proof'],
                    ['feature' => 'Lightweight yet durable construction']
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => '3D Illuminated Signs',
                'slug' => '3d-illuminated-signs',
                'category' => 'illuminated',
                'short_description' => 'Premium illuminated signage for maximum visual impact day and night.',
                'description' => 'Our 3D illuminated signs offer an affordable and durable branding solution for a range of indoor and outdoor applications. The material is an excellent choice for simple but impactful signage, and is the ultimate material to add creativity to any space without compromising professionalism.',
                'features' => [
                    ['feature' => 'Energy-efficient LED technology'],
                    ['feature' => 'Custom lighting options available'],
                    ['feature' => 'Weather-resistant construction'],
                    ['feature' => 'Professional installation included'],
                    ['feature' => '24/7 visibility for your brand']
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Customized Gate Signs',
                'slug' => 'customized-gate-signs',
                'category' => 'gate',
                'short_description' => 'Elegant gate signs for residential and commercial properties.',
                'description' => 'We offer both illuminated and non-illuminated gate signs made from dibond material, which is durable, waterproof, and UV resistant. It also produces a classy finish to the mounted wall and provides excellent curb appeal.',
                'features' => [
                    ['feature' => 'Custom design to match property aesthetic'],
                    ['feature' => 'Illuminated and non-illuminated options'],
                    ['feature' => 'Durable dibond material construction'],
                    ['feature' => 'Professional mounting and installation'],
                    ['feature' => 'Weatherproof and UV resistant']
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Informative Signs',
                'slug' => 'informative-signs',
                'category' => 'informative',
                'short_description' => 'Professional door signs and directional signage for businesses.',
                'description' => 'Our door signs include both affordable engraved options as well as premium signs made from plexiglass, dibond, and perspex. We offer custom engraving on specific materials to create the perfect informational signage for your needs.',
                'features' => [
                    ['feature' => 'Multiple material options available'],
                    ['feature' => 'Custom engraving services'],
                    ['feature' => 'Professional mounting systems'],
                    ['feature' => 'Perfect for office and commercial use']
                ],
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Desk Branding',
                'slug' => 'desk-branding',
                'category' => 'office',
                'short_description' => 'Professional desk signs and office branding solutions.',
                'description' => 'Transform your workspace with our professional desk branding solutions. Perfect for reception areas, office desks, and customer service points, creating a cohesive and professional look throughout your business space.',
                'features' => [
                    ['feature' => 'Custom designed to match corporate identity'],
                    ['feature' => 'Multiple material options'],
                    ['feature' => 'Professional appearance'],
                    ['feature' => 'Easy to update and maintain']
                ],
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Exhibition Materials',
                'slug' => 'exhibition-materials',
                'category' => 'exhibition',
                'short_description' => 'Complete exhibition and trade show display solutions.',
                'description' => 'We supply premium quality pull-up banners, teardrops, telescopic, and X-frames ranging from 2m to 4m, perfect for trade shows, exhibitions, and promotional events. Our exhibition materials are designed to showcase your brand effectively.',
                'features' => [
                    ['feature' => 'High-quality printing for vibrant displays'],
                    ['feature' => 'Portable and easy to set up'],
                    ['feature' => 'Multiple sizes available (2m to 4m)'],
                    ['feature' => 'Professional carrying cases included'],
                    ['feature' => 'Durable materials for repeated use']
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}