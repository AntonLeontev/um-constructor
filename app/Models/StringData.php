<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StringData extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_id',
        'key',
        'value',
    ];
}
