<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'service_interest',
        'message',
        'is_read',
        'is_replied',
        'admin_notes',
        'replied_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_replied' => 'boolean',
        'replied_at' => 'datetime',
    ];

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    public function markAsReplied()
    {
        $this->update([
            'is_replied' => true,
            'replied_at' => now(),
        ]);
    }
}