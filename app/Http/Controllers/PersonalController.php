<?php

namespace App\Http\Controllers;

use App\Models\Site;

class PersonalController extends Controller
{
    public function sites()
    {
        $sites = Site::where('user_id', auth()->id())->paginate();

        return view('personal.sites', compact('sites'));
    }
}
