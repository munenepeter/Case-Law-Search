<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gazette extends Model {
    protected $table = 'gazettes';
    
    protected $fillable = [
        'gazette_number',
        'publication_date',
        'type',
        'title',
        'content_json',
        'source_url',
        'last_scraped',
        'is_valid'
    ];

    protected $casts = [
        'publication_date' => 'date',
        'last_scraped' => 'datetime',
        'is_valid' => 'boolean'
    ];

    // Query scopes
    public function scopeValid($query) {
        return $query->where('is_valid', true);
    }

    public function scopeOfType($query, string $type) {
        return $query->where('type', $type);
    }

    public function scopeBetweenDates($query, string $start, string $end) {
        return $query->whereBetween('publication_date', [$start, $end]);
    }
}
