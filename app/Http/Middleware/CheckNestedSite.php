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
        if ($domain = Domain::where('title', $request->host())->first()) {
            $site = Site::find($domain->site_id);

            //TODO change view to scriptless
            return app(SiteController::class)->show($site);
        }

        if ($request->host() === config('server.domain')) {
            return $next($request);
        }

        abort(404, 'Not found');
    }
}
