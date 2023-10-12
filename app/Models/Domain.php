<?php

namespace App\Models;

use App\Events\DomainCreated;
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
    ];

    protected $dispatchesEvents = [
        'created' => DomainCreated::class,
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
