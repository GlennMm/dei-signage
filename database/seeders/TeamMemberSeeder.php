<?php
// database/seeders/TeamMemberSeeder.php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $team_members = [
            [
                'name' => 'John Mapfumo',
                'position' => 'Founder & Creative Director',
                'bio' => 'With over 15 years of experience in the signage industry, John leads our creative vision and ensures each project meets our high standards of quality and innovation.',
                'email' => 'john@deibrandingandsignage.com',
                'phone' => '+263 777 372 623',
                'social_links' => [
                    ['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/johnmapfumo'],
                    ['platform' => 'facebook', 'url' => 'https://facebook.com/johnmapfumo']
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tendai Moyo',
                'position' => 'Production Manager',
                'bio' => 'Tendai oversees all production processes, ensuring timely delivery and consistent quality across all our projects and products.',
                'email' => 'tendai@deibrandingandsignage.com',
                'social_links' => [
                    ['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/tendaimoyo']
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Grace Chigumira',
                'position' => 'Design Lead',
                'bio' => 'Grace brings creative solutions to life with her keen eye for design and deep understanding of brand identity and visual communication.',
                'email' => 'grace@deibrandingandsignage.com',
                'social_links' => [
                    ['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/gracechigumira'],
                    ['platform' => 'instagram', 'url' => 'https://instagram.com/gracechigumira']
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'David Nyamupfukudza',
                'position' => 'Client Relations Manager',
                'bio' => 'David ensures our clients receive exceptional service from initial consultation through project completion and beyond.',
                'email' => 'david@deibrandingandsignage.com',
                'phone' => '+263 777 372 624',
                'social_links' => [
                    ['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/davidnyamupfukudza']
                ],
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($team_members as $member) {
            TeamMember::create($member);
        }
    }
}