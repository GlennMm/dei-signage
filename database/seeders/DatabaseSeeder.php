<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call all seeders in the correct order
        $this->call([
            SiteSettingSeeder::class,
            CoreValueSeeder::class,
            CompanyTimelineSeeder::class,
            ServiceSeeder::class,
            TeamMemberSeeder::class,
            ClientSeeder::class,
            PortfolioSeeder::class,
            TestimonialSeeder::class,
            FAQSeeder::class,
        ]);

        $this->command->info('All seeders completed successfully!');
    }
}
