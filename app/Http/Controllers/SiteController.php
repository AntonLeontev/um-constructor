<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteStoreRequest;
use App\Http\Requests\SiteUpdateRequest;
use App\Models\Site;
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
    public function show(Site $site)
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
    public function destroy(Site $site)
    {
        $site->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
