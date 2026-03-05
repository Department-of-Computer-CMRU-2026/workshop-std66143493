<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'speaker',
        'location',
        'total_seats',
        'is_active',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
