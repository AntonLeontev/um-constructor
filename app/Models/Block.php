<?php

namespace App\Models;

use App\Events\BlockCreating;
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

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function texts(): HasMany
    {
        return $this->hasMany(Text::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(BlockType::class);
    }

    public function jsonSerialize(): mixed
    {
        $array = array_merge($this->attributesToArray(), $this->relationsToArray());

        $array['class'] = app($this->class);

        return $array;
    }

    protected $dispatchesEvents = [
        'creating' => BlockCreating::class,
    ];
}
