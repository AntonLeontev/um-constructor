<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeonardoModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'nsfw',
        'featured',
        'generated_image',
    ];

    protected $casts = [
        'generated_image' => 'array',
    ];
}
