<?php

namespace App\Models;

use App\Events\SiteCreated;
use App\Events\SiteDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    protected $dispatchesEvents = [
        'created' => SiteCreated::class,
        'deleted' => SiteDeleted::class,
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class)->orderBy('position');
    }

    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }

    public function getBlocks(): array
    {
        $result = [];

        foreach ($this->blocks as $block) {
            $result[] = app($block->class);
        }

        return $result;
    }
}
