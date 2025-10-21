<?php
// database/seeders/SiteSettingSeeder.php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Contact Information
            [
                'key' => 'contact_phone_primary',
                'value' => '+263 77 737 2623',
                'type' => 'phone',
                'group' => 'contact',
                'label' => 'Primary Phone Number',
                'description' => 'Main landline contact number',
            ],
            [
                'key' => 'contact_phone_mobile',
                'value' => '+263 777 372 623',
                'type' => 'phone',
                'group' => 'contact',
                'label' => 'Mobile Phone Number',
                'description' => 'Mobile contact number',
            ],
            [
                'key' => 'contact_email',
                'value' => 'enquiry@dei.co.zw',
                'type' => 'email',
                'group' => 'contact',
                'label' => 'Primary Email Address',
                'description' => 'Main contact email address',
            ],
            [
                'key' => 'contact_address',
                'value' => '4 Aberdeen Road, Avondale, Harare, Zimbabwe',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Business Address',
                'description' => 'Physical business address',
            ],
            [
                'key' => 'website_url',
                'value' => 'www.deibrandingandsignage.com',
                'type' => 'url',
                'group' => 'general',
                'label' => 'Website URL',
                'description' => 'Company website URL',
            ],

            // Social Media
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/deibrandingandsignage',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook URL',
                'description' => 'Facebook page URL',
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://www.instagram.com/deepend_investments_prints/',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram URL',
                'description' => 'Instagram profile URL',
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/deibrandingandsignage',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Twitter URL',
                'description' => 'Twitter profile URL',
            ],
            [
                'key' => 'social_linkedin',
                'value' => 'https://linkedin.com/company/dei-branding-signage',
                'type' => 'url',
                'group' => 'social',
                'label' => 'LinkedIn URL',
                'description' => 'LinkedIn company page URL',
            ],

            // SEO Settings
            [
                'key' => 'site_title',
                'value' => 'DEI Signage & Branding - Professional Green Media Solutions',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Site Title',
                'description' => 'Default page title for SEO',
            ],
            [
                'key' => 'site_description',
                'value' => 'Professional signage, branding, and printing services in Zimbabwe. We offer exclusive green media solutions for businesses with quality craftsmanship and innovative design.',
                'type' => 'textarea',
                'group' => 'seo',
                'label' => 'Site Description',
                'description' => 'Default meta description for SEO',
            ],
            [
                'key' => 'site_keywords',
                'value' => 'signage, branding, printing, Zimbabwe, Harare, dibond signs, illuminated signs, gate signs, office branding',
                'type' => 'textarea',
                'group' => 'seo',
                'label' => 'Site Keywords',
                'description' => 'Default meta keywords for SEO',
            ],

            // Business Information
            [
                'key' => 'business_hours',
                'value' => json_encode([
                    'monday' => '8:00 AM - 5:00 PM',
                    'tuesday' => '8:00 AM - 5:00 PM',
                    'wednesday' => '8:00 AM - 5:00 PM',
                    'thursday' => '8:00 AM - 5:00 PM',
                    'friday' => '8:00 AM - 5:00 PM',
                    'saturday' => '9:00 AM - 1:00 PM',
                    'sunday' => 'Closed'
                ]),
                'type' => 'json',
                'group' => 'general',
                'label' => 'Business Hours',
                'description' => 'Weekly business hours',
            ],
            [
                'key' => 'company_founded',
                'value' => '2015',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Company Founded Year',
                'description' => 'Year the company was established',
            ],
            [
                'key' => 'company_tagline',
                'value' => 'Your Green Media Solutions Partner',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Company Tagline',
                'description' => 'Main company tagline/slogan',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }
    }
}