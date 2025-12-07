<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateSection extends Model
{
    protected $fillable = [
        'type',
        'title',
        'highlighted_text',
        'content',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
