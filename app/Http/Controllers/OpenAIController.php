<?php

namespace App\Http\Controllers;

use App\Services\OpenAI\OpenAIApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenAIController extends Controller
{
    public function request(Request $request)
	{
		$response = OpenAIApi::completion($request->get('request'));

		return $response->json();
	}
}
