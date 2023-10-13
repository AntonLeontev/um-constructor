<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteGeneralUpdateRequest;
use App\Models\SiteGeneral;
use Illuminate\Http\Response;

class SiteGeneralController extends Controller
{
    public function update(SiteGeneral $general, SiteGeneralUpdateRequest $request)
    {
        $result = $general->update([
            'site_id' => $request->get('site_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'head_scripts' => $request->get('head_scripts'),
            'body_scripts' => $request->get('body_scripts'),
        ]);

        return response()->json($result, Response::HTTP_NO_CONTENT);
    }
}
