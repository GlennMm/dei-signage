<?php
// database/seeders/FAQSeeder.php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            // Services FAQs
            [
                'question' => 'How long does it take to complete a signage project?',
                'answer' => 'Project timelines vary depending on complexity, size, and materials. Typically, small to medium projects can be completed within 1-2 weeks, while larger projects may take 3-4 weeks. We\'ll provide you with a specific timeline during the consultation process.',
                'category' => 'services',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'question' => 'Do you offer installation services?',
                'answer' => 'Yes, we provide professional installation services for all our signage products. Our experienced team ensures proper placement, secure mounting, and clean finishing for all installations.',
                'category' => 'services',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'question' => 'What is the durability of your signs?',
                'answer' => 'Our signs are made from high-quality, durable materials designed for longevity. Dibond signs typically last 5-7 years outdoors and much longer indoors. Illuminated signs have LED components with a lifespan of approximately 50,000 hours (about 5-7 years of continuous use).',
                'category' => 'services',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'question' => 'Can you match my brand colors exactly?',
                'answer' => 'Yes, we use color matching systems to ensure your signage matches your brand colors precisely. We can work with Pantone colors, CMYK values, or physical samples to achieve the exact color match you need.',
                'category' => 'services',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'question' => 'Do you offer maintenance services for installed signs?',
                'answer' => 'Yes, we offer maintenance services for all installed signs, including cleaning, repairs, and LED replacement for illuminated signs. We can set up regular maintenance schedules to keep your signage looking its best.',
                'category' => 'services',
                'is_active' => true,
                'sort_order' => 5,
            ],

            // Contact FAQs
            [
                'question' => 'How do I request a quote for signage services?',
                'answer' => 'You can request a quote by filling out our contact form, calling us directly at +263 777 372 623, or sending an email to enquiry@dei.co.zw. Please provide as much detail as possible about your project including type of signage, dimensions, and any design preferences.',
                'category' => 'contact',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'question' => 'What areas do you service in Zimbabwe?',
                'answer' => 'We primarily serve Harare and surrounding areas, but we can accommodate projects throughout Zimbabwe for larger orders. Please contact us for more information about service in your specific location.',
                'category' => 'contact',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'question' => 'What are your business hours?',
                'answer' => 'We are open Monday to Friday from 8:00 AM to 5:00 PM, and Saturday from 9:00 AM to 1:00 PM. We are closed on Sundays. For urgent matters, you can reach us via email or our contact form.',
                'category' => 'contact',
                'is_active' => true,
                'sort_order' => 3,
            ],

            // General FAQs
            [
                'question' => 'Do you provide design services?',
                'answer' => 'Yes, we provide comprehensive design services for all our signage projects. Our experienced designers will work with you to create custom designs that align with your brand identity and project requirements.',
                'category' => 'general',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'question' => 'What materials do you use for signage?',
                'answer' => 'We use a variety of high-quality materials including Dibond (composite aluminum), perspex, plexiglass, aluminum, and LED lighting systems. Material choice depends on the application, durability requirements, and budget.',
                'category' => 'general',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'question' => 'Do you offer warranties on your products?',
                'answer' => 'Yes, we provide warranties on all our products. The warranty period varies by product type and material, typically ranging from 1-3 years. We also offer extended warranty options for additional peace of mind.',
                'category' => 'general',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($faqs as $faq) {
            FAQ::create($faq);
        }
    }
}