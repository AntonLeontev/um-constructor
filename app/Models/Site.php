<?php

namespace App\Models;

use App\Events\SiteCreated;
use App\Events\SiteDeleted;
use App\Events\SiteDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    protected $dispatchesEvents = [
        'created' => SiteCreated::class,
        'deleting' => SiteDeleting::class,
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

    public function general(): HasOne
    {
        return $this->hasOne(SiteGeneral::class);
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
