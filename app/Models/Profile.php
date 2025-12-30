<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'bio',
        'bio_id',
        'story',
        'photo',
        'email',
        'phone',
        'whatsapp',
        'location',
        'cv_file',
        'years_experience',
        'total_projects',
        'happy_clients',
        'awards',
        'hobbies',
        'social_links',
    ];

    protected $casts = [
        'hobbies' => 'array',
        'social_links' => 'array',
    ];
}
