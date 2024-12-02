<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScrapingLog extends Model {
    protected $table = 'scraping_logs';
    
    protected $fillable = [
        'scraper_type',
        'start_time',
        'end_time',
        'status',
        'items_processed',
        'items_updated',
        'items_failed',
        'error_message'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    // Get latest log for a scraper type
    public static function getLatestLog(string $scraperType) {
        return self::where('scraper_type', $scraperType)
                   ->orderBy('created_at', 'desc')
                   ->first();
    }

    // Check if scraping was successful
    public function wasSuccessful(): bool {
        return $this->status === 'Success';
    }

    // Get duration in minutes
    public function getDurationInMinutes(): float {
        if (!$this->end_time) return 0;
        
        $start = strtotime($this->start_time);
        $end = strtotime($this->end_time);
        
        return round(($end - $start) / 60, 2);
    }
}
