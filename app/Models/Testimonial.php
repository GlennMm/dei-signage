<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'client_name',
        'client_position',
        'client_company',
        'client_photo',
        'rating',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'rating' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFullClientNameAttribute()
    {
        $name = $this->client_name;
        if ($this->client_position) {
            $name .= ', ' . $this->client_position;
        }
        if ($this->client_company) {
            $name .= ' at ' . $this->client_company;
        }
        return $name;
    }
}