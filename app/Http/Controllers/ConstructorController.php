<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConstructorRequest;
use App\Models\Site;

class ConstructorController extends Controller
{
    public function __invoke(ConstructorRequest $request, Site $site)
    {
        return view('constructor.index', compact('site'));
    }
}
