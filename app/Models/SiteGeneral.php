<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteGeneral extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'site_id',
        'title',
        'description',
        'favicon',
        'head_scripts',
        'body_scripts',
    ];
}
