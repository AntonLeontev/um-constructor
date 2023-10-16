<?php

namespace App\Models;

use App\Events\DomainCreating;
use App\Events\DomainDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domain extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'site_id',
        'title',
        'is_technical',
    ];

    protected $dispatchesEvents = [
        'creating' => DomainCreating::class,
        'deleted' => DomainDeleted::class,
    ];

    protected $casts = [
        'is_technical' => 'boolean',
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
