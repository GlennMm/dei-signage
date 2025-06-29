<?php
// database/seeders/TestimonialSeeder.php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'content' => 'DEI Branding transformed our office space with their exceptional signage and branding solutions. Their attention to detail and quality craftsmanship exceeded our expectations. We\'ve received countless compliments from visitors on our new corporate identity.',
                'client_name' => 'Sarah Mukamuri',
                'client_position' => 'Marketing Director',
                'client_company' => 'ZimBank Financial Services',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'content' => 'The illuminated gate sign DEI designed for our property has transformed our entrance completely. The quality is outstanding and their team was professional from start to finish. It looks amazing both day and night.',
                'client_name' => 'David Chigumira',
                'client_position' => 'Property Owner',
                'client_company' => 'Borrowdale Estate',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'content' => 'Working with DEI for our hotel signage was a fantastic experience. They understood our brand perfectly and created signage that truly represents the luxury experience we provide to our guests.',
                'client_name' => 'Grace Mabhena',
                'client_position' => 'General Manager',
                'client_company' => 'Meikles Hotel',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'content' => 'The 3D logo sign for our shop front has increased our visibility tremendously. We\'ve had numerous customers comment on how it caught their eye from across the street. Excellent investment!',
                'client_name' => 'Michael Rusike',
                'client_position' => 'Business Owner',
                'client_company' => 'TechHub Zimbabwe',
                'rating' => 5,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}