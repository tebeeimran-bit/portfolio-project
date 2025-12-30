<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'type',
        'location',
        'start_date',
        'end_date',
        'description',
        'technologies',
        'order',
        'featured',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'technologies' => 'array',
        'featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
