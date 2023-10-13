<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainStoreRequest;
use App\Models\Domain;
use App\Models\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DomainController extends Controller
{
    public function store(Site $site, DomainStoreRequest $request): JsonResponse
    {
        $domain = Domain::create([
            'site_id' => $site->id,
            'title' => $request->get('domain'),
        ]);

        return response()->json($domain, Response::HTTP_CREATED);
    }

    public function destroy(Domain $domain)
    {
        $domain->delete();
    }
}
