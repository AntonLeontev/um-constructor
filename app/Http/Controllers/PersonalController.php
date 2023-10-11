<?php

namespace App\Http\Controllers;

use App\Models\Site;

class PersonalController extends Controller
{
    public function sitesIndex()
    {
        $sites = Site::where('user_id', auth()->id())->paginate();

        return view('personal.sites', compact('sites'));
    }

    public function siteShow(Site $site)
    {
        return view('personal.site', compact('site'));
    }
}
