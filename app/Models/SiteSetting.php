<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
    ];

    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        
        if (!$setting) {
            return $default;
        }

        return match($setting->type) {
            'json' => json_decode($setting->value, true),
            'boolean' => (bool) $setting->value,
            'integer' => (int) $setting->value,
            default => $setting->value,
        };
    }

    public static function set($key, $value, $type = 'text')
    {
        if ($type === 'json') {
            $value = json_encode($value);
        }

        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type]
        );
    }
}