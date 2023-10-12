<?php

namespace App\Services\Process;

use Illuminate\Support\Facades\Process;

class ProcessService
{
    public static function reloadNginx()
    {
        Process::run('/usr/bin/sudo -S /usr/sbin/nginx -s reload')->throw();
    }
}
