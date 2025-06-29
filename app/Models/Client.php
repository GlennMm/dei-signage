<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'industry',
        'website',
        'services_provided',
        'partnership_date',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'services_provided' => 'array',
        'partnership_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($client) {
            if (empty($client->slug)) {
                $client->slug = Str::slug($client->name);
            }
        });

        static::updating(function ($client) {
            if ($client->isDirty('name')) {
                $client->slug = Str::slug($client->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByIndustry($query, $industry)
    {
        return $query->where('industry', $industry);
    }
}