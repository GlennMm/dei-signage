<?php
// database/seeders/CompanyTimelineSeeder.php

namespace Database\Seeders;

use App\Models\CompanyTimeline;
use Illuminate\Database\Seeder;

class CompanyTimelineSeeder extends Seeder
{
    public function run(): void
    {
        $timeline = [
            [
                'year' => '2015',
                'title' => 'Where It All Began',
                'description' => 'DEI was founded with a vision to provide high-quality signage solutions in Zimbabwe, starting with a small workshop and three dedicated team members.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'year' => '2017',
                'title' => 'Expanding Our Services',
                'description' => 'We expanded our service offerings to include 3D illuminated signs and custom branding solutions for corporate clients.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'year' => '2019',
                'title' => 'New Facility',
                'description' => 'We moved to our current location in Avondale, Harare, with a larger production facility and state-of-the-art equipment.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'year' => '2021',
                'title' => 'Green Initiative Launch',
                'description' => 'We launched our green initiative, committing to environmentally sustainable practices and materials in our production processes.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'year' => '2023',
                'title' => 'National Recognition',
                'description' => 'DEI was recognized as a leading signage and branding company in Zimbabwe, receiving awards for innovation and quality.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'year' => 'Today',
                'title' => 'Looking to the Future',
                'description' => 'We continue to innovate and grow, with a focus on digital integration and expanding our reach throughout Southern Africa.',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($timeline as $event) {
            CompanyTimeline::create($event);
        }
    }
}