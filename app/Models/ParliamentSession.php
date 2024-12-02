<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParliamentSession extends Model {
    protected $table = 'parliament_sessions';
    
    protected $fillable = [
        'session_type',
        'title',
        'date',
        'time',
        'location',
        'status',
        'content_json',
        'source_url',
        'last_scraped',
        'is_valid'
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'time',
        'last_scraped' => 'datetime',
        'is_valid' => 'boolean'
    ];

    // Query scopes
    public function scopeUpcoming($query) {
        return $query->where('date', '>=', date('Y-m-d'))
                     ->where('is_valid', true)
                     ->orderBy('date')
                     ->orderBy('time');
    }

    public function scopeOfType($query, string $type) {
        return $query->where('session_type', $type);
    }
}
