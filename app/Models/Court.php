<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model {
    protected $table = 'courts';
    
    protected $fillable = [
        'name',
        'court_level',
        'is_active'
    ];

    // Relationship with LegalCases
    public function cases() {
        return $this->hasMany(LegalCase::class);
    }

    // Get active courts
    public static function getActive() {
        return self::where('is_active', true)->get();
    }
}
