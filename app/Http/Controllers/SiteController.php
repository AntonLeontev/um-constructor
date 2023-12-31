<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteDestroyRequest;
use App\Http\Requests\SiteShowRequest;
use App\Http\Requests\SiteStoreRequest;
use App\Http\Requests\SiteUpdateRequest;
use App\Models\Site;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class SiteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(SiteStoreRequest $request)
    {
        $site = Site::create([
            'title' => $request->get('title'),
            'user_id' => auth()->id(),
        ]);

        return response()->json($site);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site, SiteShowRequest $request): View|Factory
    {
        return view('constructor.site-preview', compact('site'));
    }

    public function showByDomain(Site $site): View|Factory
    {
        return view('constructor.site-preview', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiteUpdateRequest $request, Site $site)
    {
        $site->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site, SiteDestroyRequest $request)
    {
        $site->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
