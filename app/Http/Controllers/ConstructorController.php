<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConstructorRequest;
use App\Models\Block;
use App\Models\Site;

class ConstructorController extends Controller
{
    public function __invoke(ConstructorRequest $request, Site $site)
    {
        $blocks = Block::query()
            ->where('site_id', $site->id)
            ->orderBy('position')
            ->get(['id', 'title', 'class', 'is_active', 'position']);

        return view('constructor.new', compact('site', 'blocks'));
    }
}
