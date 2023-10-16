<?php

namespace App\Http\Middleware;

use App\Http\Controllers\SiteController;
use App\Models\Domain;
use App\Models\Site;
use Closure;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CheckNestedSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response|View
    {
        if ($request->host() === config('server.domain')) {
            return $next($request);
        }

        if ($domain = Domain::where('title', $request->host())->first()) {
            $site = Site::find($domain->site_id);

            return app(SiteController::class)->showByDomain($site);
        }

        abort(404, 'Not found');
    }
}
