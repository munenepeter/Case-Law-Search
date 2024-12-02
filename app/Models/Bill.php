<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model {
    protected $table = 'bills';
    
    protected $fillable = [
        'title',
        'bill_number',
        'year',
        'status',
        'sponsor',
        'introduction_date',
        'last_updated',
        'summary',
        'content_json',
        'pdf_url',
        'source_url',
        'last_scraped',
        'is_valid'
    ];

    // Helper method to get content as array
    public function getContent(): array {
        return json_decode($this->content_json, true) ?? [];
    }

    // Helper method to update content
    public function updateContent(array $content): void {
        $this->content_json = json_encode($content);
        $this->last_updated = date('Y-m-d');
        $this->save();
    }

    // Scope for active bills
    public function scopeActive($query) {
        return $query->where('is_valid', true);
    }

    // Scope for bills by year
    public function scopeByYear($query, int $year) {
        return $query->where('year', $year);
    }
}
