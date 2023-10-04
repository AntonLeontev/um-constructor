<?php

namespace App\Models;

use App\Casts\BlockClassCast;
use App\Events\BlockCreating;
use App\Events\BlockDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'title',
        'class',
        'position',
        'is_active',
    ];

    protected $casts = [
        'class' => BlockClassCast::class,
    ];

    protected $dispatchesEvents = [
        'creating' => BlockCreating::class,
        'deleting' => BlockDeleting::class,
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function stringData(): HasMany
    {
        return $this->hasMany(StringData::class);
    }

    public function getSavedData(): array
    {
        $result = [];

        foreach ($this->stringData as $data) {
            $result[$data->key] = $data->value;
        }

        return $result;
    }
}
