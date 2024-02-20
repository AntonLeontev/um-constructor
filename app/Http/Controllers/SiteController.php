<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReorderBlocksRequest;
use App\Http\Requests\SiteDestroyRequest;
use App\Http\Requests\SiteShowRequest;
use App\Http\Requests\SiteStoreRequest;
use App\Http\Requests\SiteUpdateRequest;
use App\Models\Block;
use App\Models\Site;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SiteController extends Controller
{
    public function store(SiteStoreRequest $request)
    {
        $site = Site::create([
            'title' => $request->get('title'),
            'user_id' => auth()->id(),
        ]);

        return response()->json($site);
    }

    public function show(Site $site, SiteShowRequest $request): View|Factory
    {
        $blocks = Block::where('site_id', $site->id)
            ->orderBy('position')
            ->with('stringData')
            ->get(['id', 'position', 'class']);

        return view('constructor.site-preview', compact('site', 'blocks'));
    }

    public function showByDomain(Site $site): View|Factory
    {
        $blocks = Block::where('site_id', $site->id)
            ->orderBy('position')
            ->with('stringData')
            ->get(['id', 'position', 'class']);

        return view('constructor.site-preview', compact('site', 'blocks'));
    }

    public function update(SiteUpdateRequest $request, Site $site)
    {
        $site->update($request->all());
    }

    public function destroy(Site $site, SiteDestroyRequest $request): Response|ResponseFactory
    {
        $site->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function reorderBlocks(Site $site, ReorderBlocksRequest $request): JsonResponse
    {
        foreach ($request->get('blocks') as $key => $block) {
            Block::where('id', $block['id'])->update(['position' => $key]);
        }

        return response()->json();
    }
}
