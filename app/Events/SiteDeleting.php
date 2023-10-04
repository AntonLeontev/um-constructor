<?php

namespace App\Events;

use App\Models\Site;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SiteDeleting
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Site $site)
    {
    }
}
