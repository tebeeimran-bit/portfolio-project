<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'website_title',
        'title',
        'bio',
        'bio_id',
        'story',
        'photo',
        'favicon',
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
        'visible_sections',
    ];

    protected $casts = [
        'hobbies' => 'array',
        'social_links' => 'array',
        'visible_sections' => 'array',
    ];
}
