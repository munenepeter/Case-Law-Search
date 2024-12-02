<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LegalCase extends Model {
    protected $table = 'cases';
    
    protected $fillable = [
        'case_number',
        'citation',
        'title',
        'court_id',
        'judge_names',
        'hearing_date',
        'judgment_date',
        'parties',
        'summary',
        'content_hash',
        'pdf_url',
        'source_url',
        'last_scraped',
        'is_valid'
    ];

    protected $casts = [
        'hearing_date' => 'date',
        'judgment_date' => 'date',
        'last_scraped' => 'datetime',
        'is_valid' => 'boolean'
    ];

    public function court(): BelongsTo {
        return $this->belongsTo(Court::class);
    }

    public function hasContentChanged(string $newContentHash): bool {
        return $this->content_hash !== $newContentHash;
    }

    public function markInvalid(): void {
        $this->is_valid = false;
        $this->save();
    }

    // Query scopes
    public function scopeValid($query) {
        return $query->where('is_valid', true);
    }

    public function scopeByCourt($query, $courtId) {
        return $query->where('court_id', $courtId);
    }

    public function scopeByYear($query, $year) {
        return $query->whereYear('judgment_date', $year);
    }

    public function scopeRecent($query, $limit = 10) {
        return $query->valid()
                    ->orderBy('judgment_date', 'desc')
                    ->limit($limit);
    }
}
